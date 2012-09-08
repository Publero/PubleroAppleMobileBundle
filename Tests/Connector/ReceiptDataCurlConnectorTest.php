<?php
namespace Publero\AppleMobileBundle\Tests\Connector;

use Publero\AppleMobileBundle\Connector\ReceiptDataCurlConnector;

class ReceiptDataCurlConnectorTest extends AbstractReceiptDataConnectorTest
{
    /**
     * @var string
     */
    private $verificationUrl = 'https://sandbox.itunes.apple.com/verifyReceipt';

    protected function createDataConnector()
    {
        return new ReceiptDataCurlConnector($this->verificationUrl);
    }

    /**
     * @expectedException Publero\AppleMobileBundle\Connector\Exception\CurlErrorException
     * @expectedExceptionMessage Couldn't resolve host 'example_THATWILLNEVEREXISTS%^$&.com'
     * @expectedExceptionCode 6
     */
    public function testDoRequestThrowsExceptionIfCannotConnectToRemoteHost()
    {
        $connector = new ReceiptDataCurlConnector('http://example_THATWILLNEVEREXISTS%^$&.com');
        $connector->doRequest('example');
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Empty response
     */
    public function testDoRequestThrowsExceptionIfResponseIsEmpty()
    {
        $connector = new ReceiptDataCurlConnector('http://example.com/i_do_not_work');
        $connector->doRequest('example_request_with_empty_response');
    }

    public function testGetVerificationUrl()
    {
        $this->assertEquals($this->verificationUrl, $this->getDataConnector()->getVerificationUrl());
    }
}
