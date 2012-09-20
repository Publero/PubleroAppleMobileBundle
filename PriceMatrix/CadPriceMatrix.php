<?php
namespace Publero\AppleMobileBundle\PriceMatrix;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class CadPriceMatrix extends UsdPriceMatrix
{
    public function getCurrency()
    {
        return 'CAD';
    }
}
