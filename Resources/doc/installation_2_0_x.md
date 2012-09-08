Insatllation on Symfony version 2.0.x
=====================================

### Step 1: Download PubleroAppleMobileBundle

**Using the vendors script**

If you don't use composer you can use vendor scripts instead. Make sure to add following lines into your deps file.

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

You can also use submodules. To do so run following commands:

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