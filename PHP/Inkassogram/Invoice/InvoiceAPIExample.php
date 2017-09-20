<?php
/**
 * Inkassogram Invoice SOAP API Client
 *
 * @author      Inkassogram <dev@inkassogram.se>
 * @author      Simon Stal <simon@inkassogram.se>
 * @copyright   2013 Inkassogram AB (publ)
 * @version     2.0.0
 * @package     Inkassogram
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

/********************************************************************************
 * >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> README <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
 * 1. Set a valid customer number and authentication token.
 * 2. Uncomment any operation and set proper values.
 * 3. Run.
 *******************************************************************************/

    spl_autoload_register('customAutoLoader');

/********************************************************************************
 * Initialize InvoiceClient
 *******************************************************************************/

    // Override any default options by adding an array in the constructor e.g.
    // new \Inkassogram\Invoice\InvoiceClient(array('connection_timeout' => 999));
    $client = new \Inkassogram\Invoice\InvoiceClient();
    $client->setCustomerNumber('CUSTOMER_NUMBER_AS_INT')
           ->setAuthToken('AUTH_TOKEN');

/********************************************************************************
 * SsnCheck request
 *******************************************************************************/

    $ssnCheckRequest = new \Inkassogram\Invoice\Contract\SsnCheckRequest();
    $ssnCheckRequestType = new \Inkassogram\Invoice\Contract\SsnCheckRequestType();
    $ssnCheckRequestType->setSsn('ORG_NO_OR_SSN');
    $ssnCheckRequestType->setCredit_check(0);
    $ssnCheckRequest->setRequest($ssnCheckRequestType);
    //clientCall('SsnCheck', $ssnCheckRequest);

/********************************************************************************
 * InvoiceStatus request
 *******************************************************************************/

    $invoiceStatusRequest = new \Inkassogram\Invoice\Contract\InvoiceStatusRequest();
    $invoiceStatusRequestType = new \Inkassogram\Invoice\Contract\InvoiceStatusRequestType();
    $invoiceStatusRequestType->setOcr('OCR_NUMBER_AS_INT');
    $invoiceStatusRequest->setRequest($invoiceStatusRequestType);
    //clientCall('InvoiceStatus', $invoiceStatusRequest);

/********************************************************************************
 * InvoiceDetails request
 *******************************************************************************/

    $invoiceDetailsRequest = new \Inkassogram\Invoice\Contract\InvoiceDetailsRequest();
    $invoiceDetailsRequestType = new \Inkassogram\Invoice\Contract\InvoiceDetailsRequestType();
    $invoiceDetailsRequestType->setOcr('OCR_NUMBER_AS_INT');
    $invoiceDetailsRequest->setRequest($invoiceDetailsRequestType);
    //clientCall('InvoiceDetails', $invoiceDetailsRequest);

/********************************************************************************
 * ActivateInvoice request
 *******************************************************************************/

    $activateInvoiceRequest = new \Inkassogram\Invoice\Contract\ActivateInvoiceRequest();
    $activateInvoiceRequestType = new \Inkassogram\Invoice\Contract\ActivateInvoiceRequestType();
    $activateInvoiceRequestType->setOcr('OCR_NUMBER_AS_INT');
    $activateInvoiceRequest->setRequest($invoiceDetailsRequestType);
    //clientCall('ActivateInvoice', $activateInvoiceRequest);

/********************************************************************************
 * ResendInvoice request
 *******************************************************************************/

    $resendInvoiceRequest = new \Inkassogram\Invoice\Contract\ResendInvoiceRequest();
    $resendInvoiceRequestType = new \Inkassogram\Invoice\Contract\ResendInvoiceRequestType();
    $resendInvoiceRequestType->setOcr('OCR_NUMBER_AS_INT');
    $resendInvoiceRequestType->setEmail('EMAIL_ADDRESS');
    $resendInvoiceRequestType->setInvoice_state(1);
    $resendInvoiceRequestType->setPrint_setup(1);
    $resendInvoiceRequest->setRequest($resendInvoiceRequestType);
    //clientCall('ResendInvoice', $resendInvoiceRequest);

/********************************************************************************
 * PauseInvoice request
 *******************************************************************************/

    $pauseInvoiceRequest = new \Inkassogram\Invoice\Contract\PauseInvoiceRequest();
    $pauseInvoiceRequestType = new \Inkassogram\Invoice\Contract\PauseInvoiceRequestType();
    $pauseInvoiceRequestType->setOcr('OCR_NUMBER_AS_INT');
    $pauseInvoiceRequestType->setPause(true);
    $pauseInvoiceRequest->setRequest($pauseInvoiceRequestType);
    //clientCall('PauseInvoice', $pauseInvoiceRequest);

/********************************************************************************
 * SearchCompany request
 *******************************************************************************/

    $searchCompanyRequest = new \Inkassogram\Invoice\Contract\SearchCompanyRequest();
    $searchCompanyRequestType = new \Inkassogram\Invoice\Contract\SearchCompanyRequestType();
    $searchCompanyRequestType->setCompany_name('Inkassogram');
    $searchCompanyRequestType->setPhonetic_search(true);
    $searchCompanyRequestType->setNumber_hits(10);
    $searchCompanyRequest->setRequest($searchCompanyRequestType);
    //clientCall('SearchCompany', $searchCompanyRequest);

/********************************************************************************
 * Client call
 *******************************************************************************/

    /**
     * The client call
     * @param string $method eg. SsnCheck, InvoiceStatus etc
     * @param object $request
     */
    function clientCall($method, $request)
    {
        global $client;
        try {
            $response = $client->$method($request);
            var_dump($client->__getLastRequest());
            var_dump($response);
        } catch (\Exception $e) {
            // Do logging here ...
            var_dump($e->getMessage());
            var_dump($client->__getLastRequest());
        }
    }

/********************************************************************************
 * Autoloading. Do NOT use if you are using Composer to autoload dependencies.
 *******************************************************************************/

    /**
     * Autoloading
     * @param string $class
     */
    function customAutoLoader($class)
    {
        $file = rtrim(dirname(__FILE__), '/') . '/' . $class . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            return;
        }
    }
