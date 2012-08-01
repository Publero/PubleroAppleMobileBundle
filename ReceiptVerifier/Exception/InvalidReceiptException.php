<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier\Exception;

class InvalidReceiptException extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Invalid receipt');
    }
}
