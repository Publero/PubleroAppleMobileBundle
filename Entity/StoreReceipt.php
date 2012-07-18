<?php
namespace Publero\ModelBundle\Entity\AppleMobile;

use Publero\AppleMobileBundle\Entity\AbstractStoreReceipt;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="applemobile_storereceipt")
 */
class StoreReceipt extends AbstractStoreReceipt
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @var int
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     * @ORM\Column(name="appstoretier", type="integer")
     */
    private $appStoreTier;

    /**
     * @var int
     * @ORM\Column(name="issue_id", type="integer")
     */
    private $issueId;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getAppStoreTier()
    {
        return $this->appStoreTier;
    }

    /**
     * @param int $appStoreTier
     */
    public function setAppStoreTier($appStoreTier)
    {
        $this->appStoreTier = $appStoreTier;
    }

    /**
     * @return int
     */
    public function getIssueId()
    {
        return $this->issueId;
    }

    /**
     * @param int $issueId
     */
    public function setIssueId($issueId)
    {
        $this->issueId = $issueId;
    }
}