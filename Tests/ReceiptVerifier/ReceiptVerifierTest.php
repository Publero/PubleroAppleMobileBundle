<?php
namespace Publero\AppleMobileBundle\Tests\ReceiptVerifier;

use Publero\AppleMobileBundle\ReceiptVerifier\ReceiptVerifier;
use Publero\AppleMobileBundle\ReceiptVerifier\VerificationConnector;
use Publero\AppleMobileBundle\ReceiptVerifier\VerificationDataMapper;

class ReceiptVerifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param ReceiptVerifier
     */
    private $verifier;

    /**
     * @var VerificationConnector
     */
    private $connector;

    public function setUp()
    {
        $this->connector = $this->getMock('Publero\AppleMobileBundle\ReceiptVerifier\VerificationConnector', null, array('http://www.example.com/'));
        $this->connector
            ->expects($this->any())
            ->method('makeRequest')
            ->will($this->returnValue(''))
        ;

        $dataMapper = new VerificationDataMapper();

        $this->verifier = new ReceiptVerifier($this->connector, $dataMapper);
    }

    private function getConnectorMock()
    {
    }

    public function testIsReceiptDataValid()
    {
    }

    public function testGetStoreReceipt()
    {
    }

    public function testGetStoreReceiptThrowsExceptionIfReceiptDataIsInvalid()
    {
    }
}
