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

    public function testDoRequestThrowsExceptionIfCannotConnectToRemoteHost()
    {
        $this->markTestIncomplete('I need to find way how to test connection to remote host');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Empty response
     */
    public function testDoRequestThrowsExceptionIfResponseIsEmpty()
    {
        $this->markTestIncomplete('I need to find way how to make curl to return empty result');
    }

    public function testGetVerificationUrl()
    {
        $this->assertEquals($this->verificationUrl, $this->getDataConnector()->getVerificationUrl());
    }
}
