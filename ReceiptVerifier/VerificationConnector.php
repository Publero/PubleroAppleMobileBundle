<?php

class VerificationConnector
{
    /**
     * @param string $receipt
     * @return array
     */
    public function makeRequest($receipt)
    {
        $curl = curl_init($this->getVerificationUrl());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

        $response     = curl_exec($curl);
        $errorNumber  = curl_errno($curl);
        $errorMessage = curl_error($curl);
        curl_close($curl);

        if ($errorNumber != 0) {
            throw new \RuntimeException($errorMessage, $errorNumber);
        }

        return $response;
    }

    /**
     * @param string
     * @return string
     */
    private function prepareReceipt($receipt)
    {
        return json_encode(array('receipt-data' => $receipt));
    }
}
