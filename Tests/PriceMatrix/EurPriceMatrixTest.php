<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\EurPriceMatrix;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class EurPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new EurPriceMatrix();
    }
}