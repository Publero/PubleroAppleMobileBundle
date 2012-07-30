Verifying Store Receipt
=======================

Work in progress on documentation. I am currently working on unit tests as i have to somehow test connection to appstore verification server.
Meantime, here are some code snippets:

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
        // Handle invalid receipt, for example with monolog critical log.
    }
```