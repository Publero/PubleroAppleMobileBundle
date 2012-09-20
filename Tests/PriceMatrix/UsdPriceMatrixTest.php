<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\UsdPriceMatrix;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class UsdPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new UsdPriceMatrix();
    }
}