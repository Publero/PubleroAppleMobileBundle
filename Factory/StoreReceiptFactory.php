<?php
namespace Publero\AppleMobileBundle\Factory;

class StoreReceiptFactory
{
    /**
     * @var string
     */
    private $storeReceiptClass;

    /**
     * @param string $storeReceiptClass
     */
    public function __construct($storeReceiptClass)
    {
        $this->storeReceiptClass = $storeReceiptClass;
    }

    /**
     * @return \Publero\AppleMobileBundle\Model\StoreReceipt
     */
    public function createStoreReceipt()
    {
        $storeReceipt = new $this->storeReceiptClass;

        return $storeReceipt;
    }
}
