<?php
namespace Publero\AppleMobileBundle\PriceMatrix;
/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class UsdPriceMatrix extends PriceMatrix
{
    public function getCurrency()
    {
        return 'USD';
    }

    public function getPrices()
    {
        return [
            1 => 0.99, 1.99, 2.99, 3.99, 4.99, 5.99, 6.99, 7.99, 8.99, 9.99, 10.99, 11.99, 12.99, 13.99, 14.99,
            15.99, 16.99, 17.99, 18.99, 19.99, 20.99, 21.99, 22.99, 23.99, 24.99, 25.99, 26.99, 27.99, 28.99, 29.99,
            30.99, 31.99, 32.99, 33.99, 34.99, 35.99, 36.99, 37.99, 38.99, 39.99, 40.99, 41.99, 42.99, 43.99, 44.99,
            45.99, 46.99, 47.99, 48.99, 49.99, 54.99, 59.99, 64.99, 69.99, 74.99, 79.99, 84.99, 89.99, 94.99, 99.99,
            109.99, 119.99, 124.99, 129.99, 139.99, 149.99, 159.99, 169.99, 174.99, 179.99, 189.99, 199.99, 209.99,
            219.99, 229.99, 239.99, 249.99, 299.99, 349.99, 399.99, 449.99, 499.99, 599.99, 699.99, 799.99, 899.99,
            999.99
        ];
    }

    public function getProceeds()
    {
        return [
            1 => 0.7, 1.4, 2.1, 2.8, 3.5, 4.2, 4.9, 5.6, 6.3, 7, 7.7, 8.4, 9.1, 9.8, 10.5, 11.2, 11.9, 12.6, 13.3,
            14, 14.7, 15.4, 16.1, 16.8, 17.5, 18.2, 18.9, 19.6, 20.3, 21, 21.7, 22.4, 23.1, 23.8, 24.5, 25.2, 25.9,
            26.6, 27.3, 28, 28.7, 29.4, 30.1, 30.8, 31.5, 32.2, 32.9, 33.6, 34.3, 35, 38.5, 42, 45.5, 49, 52.5, 56,
            59.5, 63, 66.5, 70, 77, 84, 87.5, 91, 98, 105, 112, 119, 122.5, 126, 133, 140, 147, 154, 161, 168, 175,
            210, 245, 280, 315, 350, 420, 490, 560, 630, 700
        ];
    }
}
