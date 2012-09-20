<?php
namespace Publero\AppleMobileBundle\Tests\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\AudPriceMatrix;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class AudPriceMatrixTest extends PriceMatrixTest
{
    public function getPriceMatrix()
    {
        return new AudPriceMatrix();
    }
}