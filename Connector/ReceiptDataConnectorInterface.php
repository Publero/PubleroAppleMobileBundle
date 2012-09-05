<?php
namespace Publero\AppleMobileBundle\Connector;

interface ReceiptDataConnectorInterface
{
    /**
     * @param string $receiptData
     * @throws \Publero\AppleMobileBundle\Connector\CurlErrorException\EmptyResponseException
     * @return \stdClass
     */
    public function doRequest($receiptData);
}
