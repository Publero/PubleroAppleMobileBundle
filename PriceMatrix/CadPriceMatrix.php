<?php
namespace Publero\AppleMobileBundle\PriceMatrix;
/**
 * @author mhlavac
 */
class CadPriceMatrix extends UsdPriceMatrix
{
    public function getCurrency()
    {
        return 'CAD';
    }
}
