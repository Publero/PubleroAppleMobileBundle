<?php
namespace Publero\AppleMobileBundle\Tests\ReceiptVerifier;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactory;
use Publero\AppleMobileBundle\ReceiptVerifier\ReceiptVerifier;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class ReceiptVerifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param ReceiptVerifier
     */
    private $verifier;

    /**
     * @var Publero\AppleMobileBundle\Connector\ReceiptDataCurlConnector
     */
    private $connector;

    public function setUp()
    {
        $this->connector = $this->getConnectorMock();
        $storeReceiptFactory = new StoreReceiptFactory('\Publero\AppleMobileBundle\Model\StoreReceipt');

        $this->verifier = new ReceiptVerifier($this->connector, $storeReceiptFactory);
    }

    /**
     * @return VerificationConnector
     */
    private function getConnectorMock()
    {
        $connector = $this->getMock('Publero\AppleMobileBundle\Connector\ReceiptDataCurlConnector', array('doRequest'), array('http://www.example.com/'));

        return $connector;
    }

    public function testIsReceiptDataValidReturnsTrueIfResponseDataIsValid()
    {
        $responseData = new \stdClass();
        $responseData->status = 0;

        $this->connector
            ->expects($this->any())
            ->method('doRequest')
            ->will($this->returnValue($responseData))
        ;

        $this->assertTrue($this->verifier->isReceiptDataValid('test_receipt'));
    }

    public function testIsReceiptDataValidReturnsFalseIfResponseDataIsInvalid()
    {
        $responseData = new \stdClass();
        $responseData->status = 1;

        $this->connector
            ->expects($this->any())
            ->method('doRequest')
            ->will($this->returnValue($responseData))
        ;

        $this->assertFalse($this->verifier->isReceiptDataValid('test_receipt'));
    }

    public function testGetStoreReceipt()
    {
        $receipt = new \stdClass();
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
        $responseData->status = 0;

        $this->connector
            ->expects($this->any())
            ->method('doRequest')
            ->will($this->returnValue($responseData))
        ;

        $storeReceipt = $this->verifier->getStoreReceipt('test_receipt');

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

    /**
     * @expectedException Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceiptException
     */
    public function testGetStoreReceiptThrowsExceptionIfReceiptDataIsInvalid()
    {
        $responseData = new \stdClass();
        $responseData->status = 1;

        $this->connector
            ->expects($this->any())
            ->method('doRequest')
            ->will($this->returnValue($responseData))
        ;

        $this->verifier->getStoreReceipt('invalid_receipt');
    }
}
