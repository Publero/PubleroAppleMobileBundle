<?php
namespace Publero\AppleMobileBundle\Connector;

interface ReceiptDataConnectorInterface
{
    /**
     * @param string $receiptData
     * @throws \RuntimeException
     * @return \stdClass
     */
    public function doRequest($receiptData);
}
