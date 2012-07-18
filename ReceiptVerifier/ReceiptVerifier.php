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
     * @var string
     */
    private $verificationUrl;

    /**
     * @param string $verificationUrl
     */
    public function __construct($verificationUrl)
    {
        $this->verificationUrl = $verificationUrl;
    }

    /**
     * @return string
     */
    public function getVerificationUrl()
    {
        return $this->verificationUrl;
    }

    /**
     * @param string $receipt
     * @throws InvalidResponseData
     * @throws InvalidReceipt
     * @return StoreReceipt
     */
    public function validateStoreReceipt($receipt)
    {
        $connector = new VerificationConnector();
        $connector->makeRequest($receipt);
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
