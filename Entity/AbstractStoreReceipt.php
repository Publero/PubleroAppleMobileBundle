<?php
namespace Publero\AppleMobileBundle\Entity;

use Publero\AppleMobileBundle\Model\StoreReceipt;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
abstract class AbstractStoreReceipt extends StoreReceipt
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="transactionid", type="string", length=255, unique=true)
     */
    protected $transactionId;

    /**
     * @var int
     * @ORM\Column(name="quantity", type="integer")
     */
    protected $quantity;

    /**
     * @var string
     * @ORM\Column(name="productid", type="string", length=255)
     */
    protected $productId;

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

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdate", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createDate;
}