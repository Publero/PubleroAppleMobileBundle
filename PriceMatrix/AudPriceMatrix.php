<?php
namespace Publero\AppleMobileBundle\PriceMatrix;
/**
 * @author mhlavac
 */
class AudPriceMatrix extends PriceMatrix
{
    public function getCurrency()
    {
        return 'AUD';
    }

    public function getPrices()
    {
        return array(1 => 1.19, 2.49, 3.99, 4.99, 5.99, 7.99, 8.99, 9.99, 11.99,
                12.99, 13.99, 14.99, 15.99, 16.99, 17.99, 18.99, 19.99, 21.99,
                22.99, 23.99, 24.99, 26.99, 27.99, 28.99, 29.99, 31.99, 32.99,
                33.99, 34.99, 36.99, 37.99, 38.99, 39.99, 41.99, 42.99, 43.99,
                44.99, 45.99, 46.99, 47.99, 48.99, 49.99, 51.99, 52.99, 53.99,
                54.99, 56.99, 57.99, 58.99, 59.99, 69.99, 74.99, 79.99, 89.99,
                94.99, 99.99, 104.99, 109.99, 114.99, 119.99, 139.99, 149.99,
                159.99, 169.99, 189.99, 199.99, 219.99, 229.99, 239.99, 249.99,
                259.99, 269.99, 279.99, 289.99, 299.99, 349.99, 399.99, 449.99,
                499.99, 599.99, 699.99, 799.99, 899.99, 999.99, 1199.99);
    }

    public function getProceeds()
    {
        return array(1 => 0.76, 1.58, 2.54, 3.18, 3.81, 5.08, 5.72, 6.36, 7.63,
                8.27, 8.9, 9.54, 10.18, 10.81, 11.45, 12.08, 12.72, 13.99,
                14.63, 15.27, 15.9, 17.18, 17.81, 18.45, 19.08, 20.36, 20.99,
                21.63, 22.27, 23.54, 24.18, 24.81, 25.45, 26.72, 27.36, 27.99,
                28.63, 29.27, 29.9, 30.54, 31.18, 31.81, 33.08, 33.72, 34.36,
                34.99, 36.27, 36.9, 37.54, 38.18, 44.54, 47.72, 50.9, 57.27,
                60.45, 63.63, 66.81, 69.99, 73.18, 76.36, 89.08, 95.45, 101.81,
                108.18, 120.9, 127.27, 139.99, 146.36, 152.72, 159.08, 165.45,
                171.81, 178.18, 184.54, 190.9, 222.72, 254.54, 286.36, 318.18,
                381.81, 445.45, 509.08, 572.72, 636.36, 763.63);
    }
}
