<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\EurPriceMatrix;

/**
 * @author mhlavac
 */
class EurPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new EurPriceMatrix();
    }
}