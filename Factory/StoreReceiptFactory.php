<?php
namespace Publero\AppleMobileBundle\Factory;

class StoreReceiptFactory
{
    /**
     * @var string
     */
    private $storeReceiptClass;

    /**
     * @param string $storeReceiptClass
     */
    public function __construct($storeReceiptClass)
    {
        $this->storeReceiptClass = $storeReceiptClass;
    }

    /**
     * @param \stdClass $data
     * @throws InvalidResponseData
     * @return \Publero\AppleMobileBundle\Model\StoreReceipt
     */
    public function createStoreReceiptFromObject(\stdClass $data)
    {
        $storeReceipt = $this->createStoreReceipt();
        $storeReceipt->setQuantity($data->quantity);
        $storeReceipt->setProductId($data->product_id);
        $storeReceipt->setTransactionId($data->transaction_id);
        $storeReceipt->setPurchaseDate(new \DateTime($data->purchase_date));
        $storeReceipt->setOriginalTransactionId($data->original_transaction_id);
        $storeReceipt->setOriginalPurchaseDate(new \DateTime($data->original_purchase_date));
        $storeReceipt->setItemId($data->item_id);
        $storeReceipt->setApplicationBundleId($data->bid);
        $storeReceipt->setApplicationVersion($data->bvrs);

        return $storeReceipt;
    }

    /**
     * @return \Publero\AppleMobileBundle\Model\StoreReceipt
     */
    public function createStoreReceipt()
    {
        $storeReceipt = new $this->storeReceiptClass;

        return $storeReceipt;
    }
}
