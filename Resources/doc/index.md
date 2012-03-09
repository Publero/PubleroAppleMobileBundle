Getting Started With PubleroAppleMobileBundle
=============================================

This bundle handles apple AppStore tiers and InApp purchases validation.

## Installation

### Step 1: Download PubleroAppleMobileBundle

**Using the vendors script**

Add the following lines in your `deps` file:

```
[PubleroAppleMobileBundle]
    git=git://github.com/Publero/PubleroAppleMobileBundle.git
    target=bundles/Publero/AppleMobileBundle
```

Now, run the vendors script to download the bundle:

``` bash
$ php bin/vendors install
```

**Using submodules** 

If you prefer instead to use git submodules, then run the following:

``` bash
$ git submodule add git://github.com/Publero/PubleroAppleMobileBundle.git vendor/bundles/Publero/AppleMobileBundle
$ git submodule update --init
```

### Step 2: Configure the Autoloader

Add the `Publero` namespace to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    'Publero' => __DIR__.'/../vendor/bundles',
));
```

### Step 3: Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        new Publero\AppleMobileBundle\PubleroAppleMobileBundle(),
    );
}
```

### Next Steps

That's it you have completed the installation. You can already use PriceMatrixes for defining AppStore tiers. For StoreReceipt
verifying you need to define your StoreReceipt class.

- [Using Price Matrixes](using_price_matrixes.md)
- [Verifying Store Receipts and creating StoreReceipt classs](verifying_store_receipt.md)