<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\JpyPriceMatrix;

/**
 * @author mhlavac
 */
class JpyPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new JpyPriceMatrix();
    }
}