<?php
namespace Publero\AppleMobileBundle\PriceMatrix\Exception;

use Publero\AppleMobileBundle\PriceMatrix\PriceMatrix;

/**
 * @author mhlavac
 */
class OutOfAllowedRangeException extends \Exception
{
    /**
     * @param int $tier
     */
    public function __construct($tier) {
        parent::__construct('Given tier "' . $tier . '" is not within allowed range (min: ' . PriceMatrix::TIER_MIN . ', max: ' . PriceMatrix::TIER_MAX . ').');
    }
}