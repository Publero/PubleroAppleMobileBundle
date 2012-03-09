<?php
namespace Publero\AppleMobileBundle\Tests\Manager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

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

    public function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->doctrine = $kernel->getContainer()->get('doctrine');
        $this->em = $this->doctrine->getEntityManager();
    }

    public function testSetDoctrine()
    {
    }

    public function testCreateStoreReceipt()
    {

    }
}
