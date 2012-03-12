AppStore Tiers - Using Price Matrixes
=====================================

This bundle gives you price matrxies for every currency supported by Apple. It's pretty simple. You can get price and proceeds for each tier
or for all of them.

## Accessing price of specific tier

To access one specific tier you have to know currency and tier.

``` php
    $currency = 'USD';
    $tier     = 3;

    $priceMatrix = $serviceContainer->get('publero.applemobile.price')->getPriceMatrix($currency);
    
    $tierPrice   = $priceMatrix->getPrice($tier);
    $tierProceed = $priceMatrix->getProceed($tier);
```

## Getting prices of all tiers for given currency

If you want to get all prices of given currency you have to call getPrices on PriceMatrix instead of getPrice.

``` php
    $currency = 'USD';

    $priceMatrix = $serviceContainer->get('publero.applemobile.price')->getPriceMatrix($currency);
    
    $prices   = $priceMatrix->getPrices();
```

## Getting prices of all tiers for all currencies

PriceMatrixes are extended from abstract and therefore you can access same methods for all of them. In following code
you can see how to access prices of all tiers for all price matrixes

``` php
    $priceMatrixes = $serviceContainer->get('publero.applemobile.price')->getPriceMatrixesForAllCurrencies();
    
    $prices = array();
    foreach ($priceMatrixes as $priceMatrix) {
        $prices[$priceMatrix->getCurrency()] = $priceMatrix->getPrices();
    }
``` 