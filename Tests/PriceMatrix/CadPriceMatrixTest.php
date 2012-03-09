<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\CadPriceMatrix;

/**
 * @author mhlavac
 */
class CadPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new CadPriceMatrix();
    }
}