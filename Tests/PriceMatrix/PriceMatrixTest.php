<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\PriceMatrix;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
abstract class PriceMatrixTest extends \PHPUnit_Framework_TestCase
{
    private $testTier = PriceMatrix::TIER_MIN;

    /**
     * @return PriceMatrix
     */
    abstract public function getPriceMatrix();

    public function testGetCurrency()
    {
        $currency = $this->getPriceMatrix()->getCurrency();

        $this->assertRegExp('/[A-Z]{3}/', $currency);
    }

    public function testGetPrices()
    {
        $pricing = $this->getPriceMatrix();

        $prices = $pricing->getPrices();
        $this->checkValueArray($prices);
    }

    public function testGetProceeds()
    {
        $pricing = $this->getPriceMatrix();

        $proceeds = $pricing->getProceeds();
        $this->checkValueArray($proceeds);
    }

    /**
     * @param array $values
     */
    private function checkValueArray($values)
    {
        $this->checkCount($values);

        $firstKey = current(array_keys($values));
        $this->assertEquals(1, $firstKey);
    }

    public function testGetAllTiers()
    {
        $pricing = $this->getPriceMatrix();

        $tiers = $pricing->getAllTiers();
        $this->checkCount($tiers);

        foreach ($tiers as $tier) {
            $price   = $tier['price'];
            $proceed = $tier['proceed'];

            $this->assertGreaterThan($proceed, $price);
            $this->assertGreaterThan(0,        $proceed);
        }
    }

    /**
     * @param array $array
     */
    private function checkCount($array)
    {
        $this->assertEquals(PriceMatrix::TIER_MAX - PriceMatrix::TIER_MIN + 1, count($array));
    }

    public function testGetPrice()
    {
        $pricing = $this->getPriceMatrix();

        $this->assertInternalType('float', $pricing->getPrice($this->testTier));
        $this->assertGreaterThan(0, $pricing->getPrice($this->testTier));
    }

    /**
     * @expectedException \Publero\AppleMobileBundle\PriceMatrix\Exception\OutOfAllowedRangeException
     */
    public function testGetPriceThrowsExceptionIfTierIsOutOfRange()
    {
        $pricing = $this->getPriceMatrix();

        $pricing->getPrice(PriceMatrix::TIER_MAX + 1);
    }

    public function testGetProceed()
    {
        $pricing = $this->getPriceMatrix();

        $this->assertInternalType('float', $pricing->getProceed($this->testTier));
        $this->assertGreaterThan(0, $pricing->getProceed($this->testTier));
    }

    /**
     * @expectedException Publero\AppleMobileBundle\PriceMatrix\Exception\OutOfAllowedRangeException
     */
    public function testGetProceedThrowsExceptionIfTierIsOutOfRange()
    {
        $pricing = $this->getPriceMatrix();

        $pricing->getProceed(PriceMatrix::TIER_MAX + 1);
    }
}