Verifying Store Receipt
=======================

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