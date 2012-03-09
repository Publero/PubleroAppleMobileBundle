<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\UsdPriceMatrix;

/**
 * @author mhlavac
 */
class UsdPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new UsdPriceMatrix();
    }
}