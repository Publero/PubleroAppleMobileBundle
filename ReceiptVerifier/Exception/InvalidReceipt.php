<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier\Exception;

class InvalidReceipt extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Invalid receipt');
    }
}
