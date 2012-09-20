<?php
namespace Publero\AppleMobileBundle\Factory;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
interface StoreReceiptFactoryAware
{
    /**
     * @return StoreReceiptFactory
     */
    public function getStoreReceiptFactory();
}
