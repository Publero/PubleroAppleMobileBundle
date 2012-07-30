<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier;

use Publero\AppleMobileBundle\Connector\ReceiptDataConnectorInterface;
use Publero\AppleMobileBundle\Factory\StoreReceiptFactory;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceipt;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidResponseData;

class ReceiptVerifier
{
    /**
     * @var VerificationConnector
     */
    private $connector;

    /**
     * @var StoreReceiptFactory
     */
    private $storeReceiptFactory;

    public function __construct(ReceiptDataConnectorInterface $connector, StoreReceiptFactory $storeReceiptFactory)
    {
        $this->connector = $connector;
        $this->storeReceiptFactory = $storeReceiptFactory;
    }

    /**
     * @param string $receipt
     * @return bool
     */
    public function isReceiptDataValid($receiptData)
    {
        $responseData = $this->connector->makeRequest($receiptData);

        return $this->isStoreReceiptValid($responseData);
    }

    /**
     * @param string $receiptData
     * @throws InvalidReceipt
     * @return \Publero\AppleMobileBundle\Model\StoreReceipt
     */
    public function getStoreReceipt($receiptData)
    {
        $responseData = $this->connector->makeRequest($receiptData);

        if (!$this->isStoreReceiptValid($responseData)) {
            throw new InvalidReceipt('Given receipt is not valid: ' . $responseData->status . ': ' . $this->getStatusMessage($responseData->status));
        }

        return $this->storeReceiptFactory->createStoreReceiptFromObject($responseData);
    }

    /**
     * @param \stdClass $responseData
     * @return bool
     */
    private function isStoreReceiptValid(\stdClass $responseData)
    {
        return $responseData->status === 0;
    }

    /**
     * @param int $status
     * @return string
     */
    private function getStatusMessage($status)
    {
        $messages = array(
            21000 => 'The App Store could not read the JSON object you provided.',
            21002 => 'The data in the receipt-data property was malformed.',
            21003 => 'The receipt could not be authenticated.',
            21004 => 'The shared secret you provided does not match the shared secret on file for your account.',
            21005 => 'The receipt server is not currently available.',
            21006 => 'This receipt is valid but the subscription has expired. When this status code is returned to your server, the receipt data is also decoded and returned as part of the response.',
            21007 => 'This receipt is a sandbox receipt, but it was sent to the production service for verification.',
            21008 => 'This receipt is a production receipt, but it was sent to the sandbox service for verification.',
        );

        if (!isset($messages[$status])) {
            return 'Unkown status';
        }

        return $messages[$status];
    }
}
