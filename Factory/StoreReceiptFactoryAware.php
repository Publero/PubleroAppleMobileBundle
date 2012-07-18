<?php
namespace Publero\AppleMobileBundle\Factory;

class StoreReceiptFactoryAware
{
    /**
     * @var StoreReceiptFactory
     */
    private $storeReceiptFactory;

    /**
     * @param StoreReceiptFactj ory $storeReceiptFactory
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
