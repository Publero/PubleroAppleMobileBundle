<?php
namespace Publero\AppleMobileBundle\Tests\Entity;

use Publero\AppleMobileBundle\Factory\StoreReceiptFactory;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Publero\AppleMobileBundle\Entity\StoreReceiptManager;

class StoreReceiptManagerTest extends WebTestCase
{
    /**
     * @var \Symfony\Bundle\DoctrineBundle\Registry
     */
    private $doctrine;

    /**
     * @var \Symfony\Bundle\DoctrineBundle\EntityManager
     */
    private $entityManager;

    /**
     * @var StoreReceiptManager
     */
    private $manager;

    /**
     * @var StoreReceiptFactory
     */
    private $storeReceiptFactory;

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->doctrine = $kernel->getContainer()->get('doctrine');
        $this->entityManager = $this->doctrine->getEntityManager();
        $this->storeReceiptFactory = new StoreReceiptFactory('empty');
        $this->manager = new StoreReceiptManager();
        $this->manager->setEntityManager($this->entityManager);
        $this->manager->setStoreReceiptFactory($this->storeReceiptFactory);
    }

    public function testCreateStoreReceipt()
    {
        $storeReceipt = $this->manager->createStoreReceipt();
        $this->assertInstanceOf('Publero\AppleMobileBundle\Entity\AbstractStoreReceipt', $storeReceipt);
    }

    public function testGetStoreReceiptFactory()
    {
        $this->assertSame($this->storeReceiptFactory, $this->manager->getStoreReceiptFactory());
    }

    public function testGetEntityManager()
    {
        $this->assertSame($this->entityManager, $this->manager->getEntityManager());
    }

    public function testSetEntityManager()
    {
        $entityManager = $this->getMock('Symfony\Bundle\DoctrineBundle\EntityManager');
        $this->manager->setEntityManager($entityManager, $this->getEntityManager());
    }
}
