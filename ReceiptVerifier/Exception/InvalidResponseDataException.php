<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier\Exception;

class InvalidResponseDataException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Invalid response data');
    }
}
