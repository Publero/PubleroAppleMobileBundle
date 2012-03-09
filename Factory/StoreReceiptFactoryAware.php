<?php
namespace Publero\AppleMobileBundle\Factory;

abstract class StoreReceiptFactoryAware
{
    /**
     * @var StoreReceiptFactory
     */
    private $storeReceiptFactory;

    /**
     * @param StoreReceiptFactory $storeReceiptFactory
     */
    public function setStoreReceiptFactory(StoreReceiptFactory $storeReceiptFactory)
    {
        $this->storeReceiptFactory = $storeReceiptFactory;
    }

    /**
     * @return StoreReceiptFactory
     */
    public function getStoreReceiptFactory()
    {
        return $this->storeReceiptFactory;
    }
}
