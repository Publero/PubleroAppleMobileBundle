<?php
namespace Publero\AppleMobileBundle\Model;

/**
 * @author mhlavac
 *
 * Entity uses params described at following url:
 * https://developer.apple.com/library/ios/#documentation/NetworkingInternet/Conceptual/StoreKitGuide/VerifyingStoreReceipts/VerifyingStoreReceipts.html
 */
class StoreReceipt
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $transactionId;

    /**
     * @var \DateTime
     */
    protected $purchaseDate;

    /**
     * @var string
     */
    protected $originalTransactionId;

    /**
     * @var \DateTime
     */
    protected $originalPurchaseDate;

    /**
     * @var string
     */
    protected $itemId;

    /**
     * @var string
     */
    protected $applicationBundleId;

    /**
     * @var string
     */
    protected $applicationVersion;

    /**
     * @var \DateTime
     */
    private $createDate;

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param string $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return \DateTime
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * @param \DateTime $purchaseDate
     */
    public function setPurchaseDate(\DateTime $purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;
    }

    /**
     * @return the string
     */
    public function getOriginalTransactionId()
    {
        return $this->originalTransactionId;
    }

    /**
     * @param string $originalTransactionId
     */
    public function setOriginalTransactionId($originalTransactionId)
    {
        $this->originalTransactionId = $originalTransactionId;
    }

    /**
     * @return \DateTime
     */
    public function getOriginalPurchaseDate()
    {
        return $this->originalPurchaseDate;
    }

    /**
     * @param \DateTime $originalPurchaseDate
     */
    public function setOriginalPurchaseDate(\DateTime $originalPurchaseDate)
    {
        $this->originalPurchaseDate = $originalPurchaseDate;
    }

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param string $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return string
     */
    public function getApplicationBundleId()
    {
        return $this->applicationBundleId;
    }

    /**
     * @param string $applicationBundleId
     */
    public function setApplicationBundleId($applicationBundleId)
    {
        $this->applicationBundleId = $applicationBundleId;
    }

    /**
     * @return string
     */
    public function getApplicationVersion()
    {
        return $this->applicationVersion;
    }

    /**
     * @param string $applicationVersion
     */
    public function setApplicationVersion($applicationVersion)
    {
        $this->applicationVersion = $applicationVersion;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    public function setCreateDate(\DateTime $createDate)
    {
        $this->createDate = $createDate;
    }
}
