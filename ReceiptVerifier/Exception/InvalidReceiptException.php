<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier\Exception;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class InvalidReceiptException extends \RuntimeException
{
    /**
     * @var int
     */
    private $statusCode;

    /**
     * @param int $statusCode
     */
    public function __construct($statusCode)
    {
        parent::__construct('Receipt is not valid: ' . $statusCode);

        $this->statusCode = $statusCode;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
