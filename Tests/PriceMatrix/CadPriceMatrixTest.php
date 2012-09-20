<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\CadPriceMatrix;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class CadPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new CadPriceMatrix();
    }
}