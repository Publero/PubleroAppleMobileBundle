<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactoryAware;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceipt;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidResponseData;

class ReceiptVerifier extends StoreReceiptFactoryAware
{
    /**
     * @var VerificationConnector
     */
    private $connector;

    /**
     * @var VerificationDataMapper
     */
    private $dataMapper;

    public function __construct(VerificationConnector $connector, VerificationDataMapper $dataMapper)
    {
        $this->connector = $connector;
        $this->dataMapper = $dataMapper;
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

        return $this->dataMapper->createStoreReceiptFromObject($responseData);
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
