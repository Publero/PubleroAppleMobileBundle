<?php
namespace Publero\AppleMobileBundle\PriceMatrix;
/**
 * @author Martin Hlaváč <info@mhlavac.net>
 */
class JpyPriceMatrix extends PriceMatrix
{
    public function getCurrency()
    {
        return 'JPY';
    }

    public function getPrices()
    {
        return [
            1 => 85.0, 170.0, 250.0, 350.0, 450.0, 500.0, 600.0, 700.0, 800.0, 850.0, 900.0, 1000.0, 1100.0, 1200.0,
            1300.0, 1400.0, 1500.0, 1600.0, 1650.0, 1700.0, 1800.0, 1900.0, 2000.0, 2100.0, 2200.0, 2300.0, 2400.0,
            2450.0, 2500.0, 2600.0, 2700.0, 2800.0, 2900.0, 2950.0, 3000.0, 3100.0, 3200.0, 3300.0, 3400.0, 3450.0,
            3500.0, 3600.0, 3700.0, 3800.0, 3900.0, 3950.0, 4000.0, 4100.0, 4200.0, 4300.0, 4800.0, 5200.0, 5700.0,
            6100.0, 6500.0, 6900.0, 7400.0, 7800.0, 8200.0, 8500.0, 9500.0, 10500.0, 11000.0, 11500.0, 12500.0, 13000.0,
            14000.0, 15000.0, 15500.0, 16000.0, 16500.0, 17000.0, 18000.0, 19000.0, 20000.0, 21000.0, 22000.0, 26000.0,
            30000.0, 35000.0, 39000.0, 42500.0, 50000.0, 60000.0, 70000.0, 80000.0, 85000.0
        ];
    }

    public function getProceeds()
    {
        return [
            1 => 60.0, 119.0, 175.0, 245.0, 315.0, 350.0, 420.0, 490.0, 560.0, 595.0, 630.0, 700.0, 770.0, 840.0, 910.0,
            980.0, 1050.0, 1120.0, 1155.0, 1190.0, 1260.0, 1330.0, 1400.0, 1470.0, 1540.0, 1610.0, 1680.0, 1715.0,
            1750.0, 1820.0, 1890.0, 1960.0, 2030.0, 2065.0, 2100.0, 2170.0, 2240.0, 2310.0, 2380.0, 2415.0, 2450.0,
            2520.0, 2590.0, 2660.0, 2730.0, 2765.0, 2800.0, 2870.0, 2940.0, 3010.0, 3360.0, 3640.0, 3990.0, 4270.0,
            4550.0, 4830.0, 5180.0, 5460.0, 5740.0, 5950.0, 6650.0, 7350.0, 7700.0, 8050.0, 8750.0, 9100.0, 9800.0,
            10500.0, 10850.0, 11200.0, 11550.0, 11900.0, 12600.0, 13300.0, 14000.0, 14700.0, 15400.0, 18200.0, 21000.0,
            24500.0, 27300.0, 29750.0, 35000.0, 42000.0, 49000.0, 56000.0, 59500.0
        ];
    }
}
