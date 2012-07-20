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
            throw new InvalidReceipt($receiptData);
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
}
