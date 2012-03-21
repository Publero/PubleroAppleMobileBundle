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
        $this->verifier = new ReceiptVerifier();
    }

    public function testIsSandboxMode()
    {
        $verifier = $this->verifier;

        $this->assertFalse($verifier->isSandboxMode());
    }

    public function testSetSandboxMode()
    {
        $verifier = $this->verifier;

        $verifier->setSandboxMode(true);
        $this->assertTrue($verifier->isSandboxMode());

        $verifier->setSandboxMode(false);
        $this->assertFalse($verifier->isSandboxMode());
    }
}