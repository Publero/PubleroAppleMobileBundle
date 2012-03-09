<?php
namespace Publero\AppleMobileBundle\Entity;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactoryAware;

class StoreReceiptManager extends StoreReceiptFactoryAware
{
    /**
     * @var \Doctrine\ORM\EntityManager $entityManager
     */
    private $entityManager;

    /**
     * @return AbstractStoreReceipt
     */
    public function createStoreReceipt()
    {
        $storeReceipt = $this->getStoreReceiptFactory()->createStoreReceipt();

        return $storeReceipt;
    }

    /**
     * @param AbstractStoreReceipt $storeReceipt
     * @param bool $flush
     */
    public function persistStoreReceipt(AbstractStoreReceipt $storeReceipt, $flush = true)
    {
        $this->entityManager->persist($storeReceipt);
        $this->flush($flush);
    }

    /**
     * @param AbstractStoreReceipt $storeReceipt
     * @param bool $flush
     */
    public function deleteStoreReceipt(AbstractStoreReceipt $storeReceipt, $flush = true)
    {
        $this->entityManager->persist($storeReceipt);
        $this->flush($flush);
    }

    /**
     * @param bool $flush
     */
    private function flush($flush)
    {
        if ($flush) {
            $this->entityManager->flush();
        }
    }

    /**
     * @param \Doctrine\ORM\EntityManager $doctrine
     */
    public function setEntityManager(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }
}
