<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\JpyPriceMatrix;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class JpyPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new JpyPriceMatrix();
    }
}