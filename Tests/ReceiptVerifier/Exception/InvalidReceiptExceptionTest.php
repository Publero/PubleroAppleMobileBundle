<?php
namespace Publero\AppleMobileBundle\Tests\Exception;

use Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceiptException;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class InvalidReceiptExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $statusCode = 21000;
        $exception = new InvalidReceiptException($statusCode);

        $this->assertEquals($statusCode, $exception->getStatusCode());
        $this->assertEquals('Receipt is not valid: ' . $statusCode, $exception->getMessage());
    }
}
