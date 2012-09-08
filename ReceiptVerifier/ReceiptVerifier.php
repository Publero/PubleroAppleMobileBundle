<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier;

use Symfony\Component\Translation\Translator;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceiptException;
use Publero\AppleMobileBundle\Connector\ReceiptDataConnectorInterface;
use Publero\AppleMobileBundle\Factory\StoreReceiptFactory;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceipt;
use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidResponseData;

class ReceiptVerifier
{
    /**
     * @var ReceiptDataConnectorInterface
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
     * @param string $receiptData
     * @return bool
     */
    public function isReceiptDataValid($receiptData)
    {
        $responseData = $this->connector->doRequest($receiptData);

        return $this->isResponseDataValid($responseData);
    }

    /**
     * @param string $receiptData
     * @throws InvalidReceipt
     * @return \Publero\AppleMobileBundle\Model\StoreReceipt
     */
    public function getStoreReceipt($receiptData)
    {
        $responseData = $this->connector->doRequest($receiptData);

        if (!$this->isResponseDataValid($responseData)) {
            throw new InvalidReceiptException($responseData->status);
        }

        return $this->storeReceiptFactory->createStoreReceiptFromObject($responseData);
    }

    /**
     * @param \stdClass $responseData
     * @return bool
     */
    private function isResponseDataValid(\stdClass $responseData)
    {
        return $responseData->status === 0;
    }
}
