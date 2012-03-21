Verifying Store Receipt
=======================

Work in progress. I am currently working on refactoring this code. This documentation will be updated when the code will be refactored and tested.

Code snippet used for verification of payments.

``` php
<?php
try {
    $verifier = $this->get('publero.applemobile.receipt_verifier');
    $storeReceipt = $verifier->getStoreReceipt($receipt);
    $this->get('publero.applemobile.storereceipt_manager')->persistStoreReceipt($storeReceipt);
    
} catch (\Publero\AppleMobileBundle\ReceiptVerifier\Exception\InvalidReceipt $exception) {
    $this->get('logger')->addInfo('Invalid receipt: ' . $receipt, array('mobile', 'ios', 'payment'));
    $this->printValueAndExit('invalid_receipt');
    
} catch (Exception $exception) {
    $this->get('logger')->addCritical('Unable to verify inAppPurchase: ' . $receipt, array('mobile', 'ios', 'payment'));
}
```