<?php
namespace Publero\AppleMobileBundle\Tests\Factory;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactory;

/**
 * @author mhlavac
 */
class StoreReceiptFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StoreReceiptFactory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new StoreReceiptFactory('Publero\AppleMobileBundle\Model\StoreReceipt');
    }

    public function testCreateStoreReceipt()
    {
        $receipt = $this->factory->createStoreReceipt();

        $this->assertInstanceOf('Publero\AppleMobileBundle\Model\StoreReceipt', $receipt);
    }
}