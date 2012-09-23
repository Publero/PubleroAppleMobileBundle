Configuration reference
=======================

Full configuration:

``` yaml
publero_apple_mobile:
    store_receipt_class: AcmeBundle\Entity\StoreReceipt # optional
    sandbox: # optional, default value is true
```

Warning
-------

If you don't create and set store_receipt class then you will not be able to use
store receipt functionality. Therefore you will not be able to validate any
store receipts.
