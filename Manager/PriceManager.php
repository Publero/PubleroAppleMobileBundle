<?php
namespace Publero\AppleMobileBundle\Manager;

use Publero\AppleMobileBundle\PriceMatrix\UsdPriceMatrix;
use Publero\AppleMobileBundle\PriceMatrix\JpyPriceMatrix;
use Publero\AppleMobileBundle\PriceMatrix\GbpPriceMatrix;
use Publero\AppleMobileBundle\PriceMatrix\EurPriceMatrix;
use Publero\AppleMobileBundle\PriceMatrix\CadPriceMatrix;
use Publero\AppleMobileBundle\PriceMatrix\AudPriceMatrix;

class PriceManager
{
    /**
     * @return \Publero\AppleMobileBundle\PriceMatrix\PriceMatrix[]
     */
    public function getPriceMatrixesForAllCurrencies()
    {
        $currencies = $this->getCurrencies();

        $priceMatrixes = array();
        foreach ($currencies as $currency) {
            $priceMatrixes[$currency] = $this->getPriceMatrix($currency);
        }

        return $priceMatrixes;
    }

    /**
     * @return string[] ISO 4217 currency
     */
    public function getCurrencies()
    {
        return array('AUD', 'CAD', 'EUR', 'GBP', 'JPY', 'USD');
    }

    /**
     * @throws \OutOfAllowedRangeException
     * @param string $currency The 3-letter ISO 4217 currency code.
     * @return \Publero\AppleMobileBundle\PriceMatrix\PriceMatrix
     */
    public function getPriceMatrix($currency)
    {
        switch ($currency) {
            case 'AUD': return new AudPriceMatrix();
            case 'CAD': return new CadPriceMatrix();
            case 'EUR': return new EurPriceMatrix();
            case 'GBP': return new GbpPriceMatrix();
            case 'JPY': return new JpyPriceMatrix();
            case 'USD': return new UsdPriceMatrix();
        }

        throw new \OutOfRangeException('Given currency code "' . $currency . '" is not valid apple currency.');
    }
}