<?php
namespace Publero\AppleMobileBundle\Tests\Connector;

abstract class AbstractReceiptDataConnectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Publero\AppleMobileBundle\Connector\ReceiptDataConnectorInterface
     */
    private $dataConnector;

    public function setUp()
    {
        $this->dataConnector = $this->createDataConnector();
    }

    /**
     * @return \Publero\AppleMobileBundle\Connector\ReceiptDataConnectorInterface
     */
    abstract protected function createDataConnector();

    public function testDoRequest()
    {
        $this->markTestIncomplete('I need to find way how to test connection to remote host');
    }

    /**
     * @return \Publero\AppleMobileBundle\Connector\ReceiptDataConnectorInterface
     */
    protected function getDataConnector()
    {
        return $this->dataConnector;
    }
}
