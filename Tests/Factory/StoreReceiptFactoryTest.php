<?php
namespace Publero\AppleMobileBundle\Tests\Factory;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactory;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
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
        $receipt = new \stdClass();
        $receipt->status = 0;
        $receipt->quantity = 1;
        $receipt->product_id = 'example_product';
        $receipt->transaction_id = 'example_transaction';
        $receipt->purchase_date = '2012-07-20 10:00:00';
        $receipt->original_transaction_id = 'example_original_transaction';
        $receipt->original_purchase_date = '2012-07-20 11:00:00';
        $receipt->item_id = 'example_item';
        $receipt->bid = 'bundle';
        $receipt->bvrs = '1.0.0';

        $responseData = new \stdClass();
        $responseData->receipt = $receipt;

        $storeReceipt = $this->factory->createStoreReceiptFromObject($responseData);

        $this->assertInstanceOf('\Publero\AppleMobileBundle\Model\StoreReceipt', $storeReceipt);
        $this->assertEquals($receipt->quantity, $storeReceipt->getQuantity());
        $this->assertEquals($receipt->product_id, $storeReceipt->getProductId());
        $this->assertEquals($receipt->transaction_id, $storeReceipt->getTransactionId());
        $this->assertEquals($receipt->purchase_date, $storeReceipt->getPurchaseDate()->format('Y-m-d H:i:s'));
        $this->assertEquals($receipt->original_transaction_id, $storeReceipt->getOriginalTransactionId());
        $this->assertEquals($receipt->original_purchase_date, $storeReceipt->getOriginalPurchaseDate()->format('Y-m-d H:i:s'));
        $this->assertEquals($receipt->item_id, $storeReceipt->getItemId());
        $this->assertEquals($receipt->bid, $storeReceipt->getApplicationBundleId());
        $this->assertEquals($receipt->bvrs, $storeReceipt->getApplicationVersion());
    }
}
