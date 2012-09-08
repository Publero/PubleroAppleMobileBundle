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

    public function testCreateStoreReceiptFromObject()
    {
        $responseData = new \stdClass();
        $responseData->status = 0;
        $responseData->quantity = 1;
        $responseData->product_id = 'example_product';
        $responseData->transaction_id = 'example_transaction';
        $responseData->purchase_date = '2012-07-20 10:00:00';
        $responseData->original_transaction_id = 'example_original_transaction';
        $responseData->original_purchase_date = '2012-07-20 11:00:00';
        $responseData->item_id = 'example_item';
        $responseData->bid = 'bundle';
        $responseData->bvrs = '1.0.0';

        $storeReceipt = $this->factory->createStoreReceiptFromObject($responseData);

        $this->assertInstanceOf('\Publero\AppleMobileBundle\Model\StoreReceipt', $storeReceipt);
        $this->assertEquals($responseData->quantity, $storeReceipt->getQuantity());
        $this->assertEquals($responseData->product_id, $storeReceipt->getProductId());
        $this->assertEquals($responseData->transaction_id, $storeReceipt->getTransactionId());
        $this->assertEquals($responseData->purchase_date, $storeReceipt->getPurchaseDate()->format('Y-m-d H:i:s'));
        $this->assertEquals($responseData->original_transaction_id, $storeReceipt->getOriginalTransactionId());
        $this->assertEquals($responseData->original_purchase_date, $storeReceipt->getOriginalPurchaseDate()->format('Y-m-d H:i:s'));
        $this->assertEquals($responseData->item_id, $storeReceipt->getItemId());
        $this->assertEquals($responseData->bid, $storeReceipt->getApplicationBundleId());
        $this->assertEquals($responseData->bvrs, $storeReceipt->getApplicationVersion());
    }
}
