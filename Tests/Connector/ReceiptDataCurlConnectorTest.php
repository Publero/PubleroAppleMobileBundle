<?php
namespace Publero\AppleMobileBundle\Tests\Connector;

use Publero\AppleMobileBundle\Connector\ReceiptDataCurlConnector;

class ReceiptDataCurlConnectorTest extends AbstractReceiptDataConnectorTest
{
    private $verificationUrl = 'https://sandbox.itunes.apple.com/verifyReceipt';

    protected function createDataConnector()
    {
        return new ReceiptDataCurlConnector($this->verificationUrl);
    }

    public function doRequestThrowsExceptionIfCannotConnectToRemoteHost()
    {
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Empty response
     */
    public function doRequestThrowsExceptionIfResponseIsEmpty()
    {
        $this->getDataConnector()->doRequest('test');
    }

    public function testGetVerificationUrl()
    {
        $this->assertEquals($this->verificationUrl, $this->getDataConnector()->getVerificationUrl());
    }
}
