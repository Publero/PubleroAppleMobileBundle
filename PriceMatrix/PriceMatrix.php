<?php
namespace Publero\AppleMobileBundle\PriceMatrix;

use Publero\AppleMobileBundle\PriceMatrix\Exception\OutOfAllowedRangeException;

/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
abstract class PriceMatrix
{
    const TIER_MIN = 1;
    const TIER_MAX = 85;

    /**
     * @var float[]
     */
    private $prices = array();

    /**
     * @var float[]
     */
    private $proceeds = array();

    public function __construct()
    {
        $this->prices   = $this->getPrices();
        $this->proceeds = $this->getProceeds();
    }

    /**
     * @return string The 3-letter ISO 4217 currency code indicating the currency to use.
     */
    abstract public function getCurrency();

    /**
     * @return float[]
     */
    abstract public function getPrices();

    /**
     * @return float[]
     */
    abstract public function getProceeds();

    /**
     * @return array
     */
    public function getAllTiers()
    {
        $tiers = array();
        for ($tier = self::TIER_MIN; $tier <= self::TIER_MAX; $tier++) {
            $tiers[] = array(
                'price'   => $this->getPrice($tier),
                'proceed' => $this->getProceed($tier)
            );
        }

        return $tiers;
    }

    /**
     * @return float
     */
    public function getPrice($tier)
    {
        $tier = $this->getTierIntValue($tier);

        return $this->prices[$tier];
    }

    /**
     * @return float
     */
    public function getProceed($tier)
    {
        $tier = $this->getTierIntValue($tier);

        return $this->proceeds[$tier];
    }

    /**
     * @throws OutOfAllowedRangeException
     *
     * @param int $tier
     */
    private function getTierIntValue($tier)
    {
        $tier = (int)$tier;
        if ($this->isTierInAllowedRange($tier)) {
            return $tier;
        }

        throw new OutOfAllowedRangeException($tier);
    }

    /**
     * @param int $tier
     * @return bool
     */
    private function isTierInAllowedRange($tier)
    {
        return $tier >= self::TIER_MIN && $tier <= self::TIER_MAX;
    }
}