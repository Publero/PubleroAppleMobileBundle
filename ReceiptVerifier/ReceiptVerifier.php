<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactoryAware;
use Publero\AppleMobileBundle\Entity\StoreReceipt;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceipt;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidResponseData;

/**
 * @author mhlavac
 *
 * Most of the code was taken from great article on phpriot:
 * http://www.phpriot.com/articles/verifying-app-store-receipts-php-curl
 */
class ReceiptVerifier extends StoreReceiptFactoryAware
{
    /**
     * @var string[]
     */
    private $verificationUrls = array(
        0 => 'https://buy.itunes.apple.com/verifyReceipt',
        1 => 'https://sandbox.itunes.apple.com/verifyReceipt'
    );

    /**
     * @var bool
     */
    private $sandboxMode = false;

    /**
     * @return bool
     */
    public function getSandboxMode()
    {
        return $this->sandboxMode;
    }

    /**
     * @param bool $sandboxMode
     */
    public function setSandboxMode($sandboxMode)
    {
        $this->sandboxMode = $sandboxMode == true;
    }

    /**
     * @throws InvalidResponseData
     * @throws InvalidReceipt
     *
     * @param string $receipt
     * @return StoreReceipt
     */
    public function getStoreReceipt($receipt)
    {
        $postData     = $this->preparePostData($receipt);
        $responseData = $this->makeRequest($postData);
        $data         = $this->decodeReponseData($responseData);

        $storeReceipt = $this->getStoreReceiptFactory()->createStoreReceipt();
        $storeReceipt->setQuantity($data->quantity);
        $storeReceipt->setProductId($data->product_id);
        $storeReceipt->setTransactionId($data->transaction_id);
        $storeReceipt->setPurchaseDate(new \DateTime($data->purchase_date));
        $storeReceipt->setOriginalTransactionId($data->original_transaction_id);
        $storeReceipt->setOriginalPurchaseDate(new \DateTime($data->original_purchase_date));
        $storeReceipt->setItemId($data->item_id);
        $storeReceipt->setApplicationBundleId($data->bid);
        $storeReceipt->setApplicationVersion($data->bvrs);

        return $storeReceipt;
    }

    /**
     * @param string $receipt
     * @return string
     */
    private function preparePostData($receipt)
    {
        return json_encode(array('receipt-data' => $receipt));
    }

    /**
     * @param string $postData
     * @return array
     */
    private function makeRequest($postData)
    {
        $curl = curl_init($this->getVerificationUrl());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

        $response     = curl_exec($curl);
        $errorNumber  = curl_errno($curl);
        $errorMessage = curl_error($curl);
        curl_close($curl);

        if ($errorNumber != 0) {
            throw new \RuntimeException($errorMessage, $errorNumber);
        }

        return $response;
    }

    /**
     * @return string
     */
    public function getVerificationUrl()
    {
        return $this->verificationUrls[$this->getSandboxMode()];
    }

    /**
     * @throws InvalidResponseData
     * @throws InvalidReceipt
     *
     * @param string $reponseData
     * @return StoreReceipt
     */
    private function decodeReponseData($responseData)
    {
        $data = json_decode($responseData);

        if (!is_object($data)) {
            throw new InvalidResponseData();
        }

        if (!isset($data->status) || $data->status != 0) {
            throw new InvalidReceipt();
        }

        return $data->receipt;
    }
}
