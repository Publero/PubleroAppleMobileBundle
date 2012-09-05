<?php
namespace Publero\AppleMobileBundle\Connector;

use Publero\AppleMobileBundle\Connector\CurlErrorException\EmptyResponseException;
use Publero\AppleMobileBundle\Connector\CurlErrorException\CurlErrorException;

class ReceiptDataCurlConnector implements ReceiptDataConnectorInterface
{
    /**
     * @var string
     */
    private $verificationUrl;

    /**
     * @param string $verificationUrl
     * @throws \InvalidArgumentException
     */
    public function __construct($verificationUrl)
    {
        if (empty($verificationUrl)) {
            throw new \InvalidArgumentException('Verification URL can not be empty');
        }

        $this->verificationUrl = $verificationUrl;
    }

    /**
     * @param string $receiptData
     * @throws CurlErrorException
     * @throws EmptyResponseException
     * @return \stdClass
     */
    public function doRequest($receiptData)
    {
        $curl = $this->initCurl($receiptData);

        $response     = \curl_exec($curl);
        $errorNumber  = \curl_errno($curl);
        $errorMessage = \curl_error($curl);
        \curl_close($curl);

        if ($errorNumber != 0) {
            throw new CurlErrorException($errorMessage, $errorNumber);
        }

        if (empty($response)) {
            throw new EmptyResponseException('Empty response');
        }

        return $this->decodeResponse($response);
    }

    /**
     * @param string $receiptData
     * @return resource curl
     */
    private function initCurl($receiptData)
    {
        $curl = \curl_init($this->getVerificationUrl());

        \curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        \curl_setopt($curl, CURLOPT_POST, true);
        \curl_setopt($curl, CURLOPT_POSTFIELDS, $this->prepareReceiptData($receiptData));

        return $curl;
    }

    /**
     * @return string
     */
    public function getVerificationUrl()
    {
        return $this->verificationUrl;
    }

    /**
     * @param string
     * @return string
     */
    private function prepareReceiptData($receiptData)
    {
        return json_encode(array('receipt-data' => $receiptData));
    }

    /**
     * @param string $response
     * @return array
     */
    private function decodeResponse($response)
    {
        return json_decode($response);
    }
}
