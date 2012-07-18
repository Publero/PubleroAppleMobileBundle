<?php
namespace Publero\AppleMobileBundle\Tests\ReceiptVerifier;

use Publero\AppleMobileBundle\ReceiptVerifier\ReceiptVerifier;

class ReceiptVerifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param ReceiptVerifier
     */
    private $verifier;

    public function setUp()
    {
        $this->verifier = new ReceiptVerifier('http://www.example.com/');
    }

    public function testGetVerificationUrl()
    {
        $this->assertEquals('http://www.example.com/', $this->verifier->getVerificationUrl());
    }
}
