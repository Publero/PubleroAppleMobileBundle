<?php
namespace Publero\AppleMobileBundle\Tests\Connector;

abstract class AbstractReceiptDataConnectorTest
{
    /**
     * @var \Publero\AppleMobileBundle\Connector\ReceiptDataConnectorInterface
     */
    private $dataConnector;

    public function setUp()
    {
        $this->dataConnector = $this->createDataConncetor;
    }

    /**
     * @return \Publero\AppleMobileBundle\Connector\ReceiptDataConnectorInterface
     */
    abstract protected function createDataConnector();

    public function testDoRequest()
    {
        $this->dataConnector->doRequest('test_data');
    }

    /**
     * @return \Publero\AppleMobileBundle\Connector\ReceiptDataConnectorInterface
     */
    protected function getDataConnector()
    {
        return $this->dataConnector;
    }
}
