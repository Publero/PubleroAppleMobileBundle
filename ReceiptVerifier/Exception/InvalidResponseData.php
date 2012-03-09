<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier\Exception;

class InvalidResponseData extends \RuntimeException
{
    public function __construct()
    {
        parent::__construct('Invalid response data');
    }
}
