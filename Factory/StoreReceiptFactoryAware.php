<?php
namespace Publero\AppleMobileBundle\Factory;

interface StoreReceiptFactoryAware
{
    /**
     * @return StoreReceiptFactory
     */
    public function getStoreReceiptFactory();
}
