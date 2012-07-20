<?php
namespace Publero\AppleMobileBundle\Tests\ReceiptVerifier;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactory;
use Publero\AppleMobileBundle\ReceiptVerifier\ReceiptVerifier;
use Publero\AppleMobileBundle\ReceiptVerifier\VerificationConnector;
use Publero\AppleMobileBundle\ReceiptVerifier\VerificationDataMapper;

class ReceiptVerifierTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param ReceiptVerifier
     */
    private $verifier;

    /**
     * @var VerificationConnector
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
        $connector = $this->getMock('Publero\AppleMobileBundle\Connector\ReceiptDataCurlConnector', array('makeRequest'), array('http://www.example.com/'));

        return $connector;
    }

    public function testIsReceiptDataValidReturnsTrueIfResponseDataIsValid()
    {
        $responseData = new \stdClass();
        $responseData->status = 0;

        $this->connector
            ->expects($this->any())
            ->method('makeRequest')
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
            ->method('makeRequest')
            ->will($this->returnValue($responseData))
        ;

        $this->assertFalse($this->verifier->isReceiptDataValid('test_receipt'));
    }

    public function testGetStoreReceipt()
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

        $this->connector
            ->expects($this->any())
            ->method('makeRequest')
            ->will($this->returnValue($responseData))
        ;

        $storeReceipt = $this->verifier->getStoreReceipt('test_receipt');

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

    /**
     * @expectedException Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceipt
     */
    public function testGetStoreReceiptThrowsExceptionIfReceiptDataIsInvalid()
    {
        $responseData = new \stdClass();
        $responseData->status = 1;

        $this->connector
            ->expects($this->any())
            ->method('makeRequest')
            ->will($this->returnValue($responseData))
        ;

        $this->verifier->getStoreReceipt('invalid_receipt');
    }
}
