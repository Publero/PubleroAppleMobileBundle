<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\GbpPriceMatrix;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class GbpPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new GbpPriceMatrix();
    }
}