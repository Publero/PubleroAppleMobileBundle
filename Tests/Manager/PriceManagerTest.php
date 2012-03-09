<?php
namespace Publero\AppleMobileBundle\Tests\Manager;

use Publero\AppleMobileBundle\Manager\PriceManager;

/**
 * @author mhlavac
 */
class PriceManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PriceManager
     */
    private $manager;

    public function setUp()
    {
        $this->manager = new PriceManager();
    }

    public function testGetPriceMatrixForAllCurrenciesReturnsPriceMatrixes()
    {
        $priceMatrixes = $this->manager->getPriceMatrixesForAllCurrencies();

        foreach ($priceMatrixes as $priceMatrix) {
            $this->assertInstanceOf('\Publero\AppleMobileBundle\PriceMatrix\PriceMatrix', $priceMatrix);
        }
    }

    public function testGetCurrenciesReturnsArrayOfStrings()
    {
        $currencies = $this->manager->getCurrencies();

        foreach ($currencies as $currency) {
            $this->assertInternalType('string', $currency);
        }
    }

    public function testGetCurrenciesReturnsISO4217Currencies()
    {
        $currencies = $this->manager->getCurrencies();

        foreach ($currencies as $currency) {
            $this->assertRegExp('/[A-Z]{3}/', $currency);
        }
    }


    public function testGetPriceMatrixReturnsPriceMatrix()
    {
        $currencies = $this->manager->getCurrencies();

        foreach ($currencies as $currency) {
            $priceMatrix = $this->manager->getPriceMatrix($currency);
            $this->assertInstanceOf('\Publero\AppleMobileBundle\PriceMatrix\PriceMatrix', $priceMatrix);
        }
    }

    /**
     * @expectedException \OutOfRangeException
     */
    public function testGetPriceMatrixThrowsExceptionIfInvalidCurrencyIsGiven()
    {
        $this->manager->getPriceMatrix('I AM NOT VALID');
    }
}