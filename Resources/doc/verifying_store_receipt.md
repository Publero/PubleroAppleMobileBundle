Verifying Store Receipt
=======================

Getting started with store receipt verification
-----------------------------------------------

If you want to verify a store receipt you will have to complete following steps:

Step 1: Create store receipt entity
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Creating *store receipt* entity is straighforward:

``` php
<?php
// src/Acme/AcmeBundle/Entity/StoreReceipt.php

namespace Acme\AcmeBundle\Entity;

use Publero\AppleMobileBundle\Entity\AbstractStoreReceipt;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="store_receipt")
 */
class StoreReceipt extends AbstractStoreReceipt
{
}
```

Step 2: Add path to your class into configuration
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

``` yaml
# app/config/config.yml
publero_apple_mobile:
    store_receipt_class: Acme\AcmeBundle\Entity\StoreReceipt
```

Step 3: Migrate your database
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Migrate your database. You can simply use following command:

``` sh
php app/aconsole doctrine:schema:update --force
```

Using store receipt verification
--------------------------------

Code snippet for verifying specific store receipt:

``` php
<?php
    $verifier = $container->get('publero_apple_mobile.store_receipt.verifier');
    $verifier->isReceiptDataValid($receiptData);
```

Code snippet to obtain all information about specific store receipt:

``` php
<?php
    $verifier = $container->get('publero_apple_mobile.store_receipt.verifier');
    try {
        $receipt = $verifier->getStoreReceipt($receiptData);
    } catch (InvalidReceipt $exception) {
        // Handle invalid store eceipt, for example with monolog critical log.
    }
```

Tips for validating store receipts
----------------------------------

Keep in mind that user can send you any store receipt. You should always check that store receipt has correct productId and applicationBundleId.

``` php
<?php
    $verifier = $container->get('publero_apple_mobile.store_receipt.verifier');
    $receipt = $verifier->getStoreReceipt($receiptData);

    if ($receipt->getProductId() != 'com.example.acmeapplication.something') {
        // Handle invalid store receipt
        throw new InvalidReceipt('Are you trying to use receipt from diferrent application?');
    }
```

Translating error messages
--------------------------

If you want to translate error messages into something what is human readable, use translator:

``` php
<?php
    $verifier = $container->get('publero_apple_mobile.store_receipt.verifier');
    $translator = $container->get('translator');

    try {
        $receipt = $verifier->getStoreReceipt($receiptData);
    } catch (InvalidReceipt $exception) {
        $translation = $translator->trans('status_message.' . $exception->getStatusCode(), array(), 'PubleroAppleMobile');

        return new Response($translation);
    }

    return new Response('everything works like a charm');
```
