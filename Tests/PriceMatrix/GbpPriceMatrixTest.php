<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\GbpPriceMatrix;

/**
 * @author mhlavac
 */
class GbpPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new GbpPriceMatrix();
    }
}