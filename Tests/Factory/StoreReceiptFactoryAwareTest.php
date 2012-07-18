<?php
namespace Publero\AppleMobileBundle\Tests\Factory;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactory;
use Publero\AppleMobileBundle\Factory\StoreReceiptFactoryAware;

class StoreReceiptFactoryAwareTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAndSetStoreReceiptFactory()
    {
        $factory = new StoreReceiptFactory('empty');
        $factoryAware = new StoreReceiptFactoryAware();
        $factoryAware->setStoreReceiptFactory($factory);

        $this->assertSame($factory, $factoryAware->getStoreReceiptFactory());
    }
}
