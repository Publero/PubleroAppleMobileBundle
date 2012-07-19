<?php
namespace Publero\AppleMobileBundle\ReceiptVerifier;

class VerificationDataMapper
{
    /**
     * @param \stdClass $data
     * @throws InvalidResponseData
     * @return \Publero\AppleMobileBundle\Model\StoreReceipt
     */
    public function createStoreReceiptFromObject(\stdClass $data)
    {
        if (!is_object($data)) {
            throw new InvalidResponseData();
        }

        $storeReceipt = $this->getStoreReceiptFactory()->createStoreReceipt();
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
}
