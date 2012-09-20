<?php
namespace Publero\AppleMobileBundle\Connector;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
interface ReceiptDataConnectorInterface
{
    /**
     * @param string $receiptData
     * @throws \Publero\AppleMobileBundle\Connector\CurlErrorException\EmptyResponseException
     * @return \stdClass
     */
    public function doRequest($receiptData);
}
