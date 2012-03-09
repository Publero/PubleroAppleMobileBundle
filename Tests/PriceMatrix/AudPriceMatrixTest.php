<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\AudPriceMatrix;

/**
 * @author mhlavac
 */
class AudPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new AudPriceMatrix();
    }
}