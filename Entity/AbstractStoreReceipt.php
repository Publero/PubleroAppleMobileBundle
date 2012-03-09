<?php
namespace Publero\AppleMobileBundle\Entity;

use Publero\AppleMobileBundle\Model\StoreReceipt;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author mhlavac
 */
abstract class AbstractStoreReceipt extends StoreReceipt
{
    /**
     * @var int
     * @ORM\Column(name="quantity", type="integer")
     */
    protected $quantity;

    /**
     * @var string
     * @ORM\Column(name="productid", type="string", length="255")
     */
    protected $productId;

    /**
     * @var string
     * @ORM\Column(name="transactionid", type="string", length="255")
     */
    protected $transactionId;

    /**
     * @var \DateTime
     * @ORM\Column(name="purchasedate", type="datetime")
     */
    protected $purchaseDate;

    /**
     * @var string
     * @ORM\Column(name="originaltransactionid", type="string")
     */
    protected $originalTransactionId;

    /**
     * @var \DateTime
     * @ORM\Column(name="originalpurchasedate", type="datetime")
     */
    protected $originalPurchaseDate;

    /**
     * @var string
     * @ORM\Column(name="itemid", type="string")
     */
    protected $itemId;

    /**
     * @var string
     * @ORM\Column(name="applicationbundleid", type="string")
     */
    protected $applicationBundleId;

    /**
     * @var string
     * @ORM\Column(name="applicationversion", type="string")
     */
    protected $applicationVersion;
}
