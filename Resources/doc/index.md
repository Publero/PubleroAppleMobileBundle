Getting Started With PubleroAppleMobileBundle
=============================================

Publero Apple Mobile Bundle provides services for managing AppStore tiers and to validate and store InApp purchases.

Prerequisites
-------------

Symfony 2.0.x or higher is required. If you are using symfony 2.0.x use this [installation guide](installation_2_0_x.md).

Installation
------------

Step 1: Download PubleroAppleMobileBundle
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Add PubleroAppleMobileBundle in your composer.json:

``` js
{
    "require": {
        "publero/apple-mobile-bundle": "*"
    }
}
```

run following command:

``` sh
composer.phar install
```

### Step 2: Enable the bundle

Enable the bundle in kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        ...
        new Publero\AppleMobileBundle\PubleroAppleMobileBundle(),
    );
}
```

### Next Steps

That's it you have completed the installation. You can already use PriceMatrixes for defining AppStore tiers. For StoreReceipt
verifying you need to define your StoreReceipt class.

- [Configuration reference](configuration_reference.md)
- [Using Price Matrixes](using_price_matrixes.md)
- [Verifying Store Receipts and creating StoreReceipt classs](verifying_store_receipt.md)
