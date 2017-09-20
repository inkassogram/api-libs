<?php
/**
 * Inkassogram Bookkeeping API Client
 *
 * @author      Inkassogram <dev@inkassogram.se>
 * @author      Simon Stal <simon@inkassogram.se>
 * @copyright   2013 Inkassogram AB (publ)
 * @version     1.0.0
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
 * Initialize BookkeepingClient
 *******************************************************************************/

    $client = new \Inkassogram\Bookkeeping\BookkeepingClient();
    $client ->setCustomerNumber('CUSTOMER_NUMBER_AS_INT')
            ->setAuthToken('AUTH_TOKEN')
            ->setIpAddress('IP_ADDRESS')
            ->setValidateXsdBeforeRequest(false);

/********************************************************************************
 * Create invoice request
 *******************************************************************************/

    $createInvoice = new \Inkassogram\Bookkeeping\Contract\CreateInvoiceRequest();
    $createRequest = new \Inkassogram\Bookkeeping\Contract\CreateInvoiceRequestType();
    $createRequest->setIsTestModeEnabled('true');
    $createRequest->setPrintSetup(1);
    $createRequest->setService(1);
    $createRequest->setOrderNumber(uniqid());
    $createRequest->setSsn('ORG_NO_OR_SSN');
    $createRequest->setEmailAddress('EMAIL_ADDRESS');
    $invoiceRow1 = new \Inkassogram\Bookkeeping\Contract\InvoiceRowType();
    $invoiceRow2 = new \Inkassogram\Bookkeeping\Contract\InvoiceRowType();
    $createRequest->setInvoiceRows(array(
        $invoiceRow1
            ->setArticleNumber('1234')
            ->setArticleText('USB Kingston')
            ->setVat(25)
            ->setPrice(20000)
            ->setQuantity(5)
            ->setBookkeepingAccount(3010),
        $invoiceRow2
            ->setArticleNumber('5678')
            ->setArticleText('Support')
            ->setVat(25)
            ->setPrice(10000)
            ->setQuantity(2)
            ->setUnit('h')
            ->setBookkeepingAccount(3010)
    ));
    $createInvoice->setRequest($createRequest);
    //clientCall('CreateInvoice', $createInvoice);

/********************************************************************************
 * Credit invoice request
 *******************************************************************************/

    $creditInvoice = new \Inkassogram\Bookkeeping\Contract\CreditInvoiceRequest();
    $creditRequest = new \Inkassogram\Bookkeeping\Contract\CreditInvoiceRequestType();
    $creditRequest->setIsTestModeEnabled('true');
    $creditRequest->setIsVatIncluded(1);
    $creditRequest->setPrintSetup(1);
    $creditRequest->setOcr('OCR_NUMBER');
    $creditRequest->setEmailAddress('EMAIL_ADDRESS');
    $creditRow1 = new \Inkassogram\Bookkeeping\Contract\CreditRowType();
    $creditRow2 = new \Inkassogram\Bookkeeping\Contract\CreditRowType();
    $creditRequest->setCreditRows(array(
        $creditRow1
            ->setArticleNumber('1234')
            ->setVat(25)
            ->setQuantity(5)
            ->setPrice(100000),
        $creditRow2
            ->setArticleNumber('5678')
            ->setVat(25)
            ->setQuantity(2)
            ->setPrice(20000)
    ));
    $creditInvoice->setRequest($creditRequest);
    //clientCall('CreditInvoice', $creditInvoice);

/********************************************************************************
 * Client call
 *******************************************************************************/

    /**
     * The client call
     * @param string $method eg. SsnChek, InvoiceStatus etc
     * @param object $request
     */
    function clientCall($method, $request)
    {
        global $client;
        try {
            $response = $client->$method($request);
            var_dump($response);
            var_dump($client->getLastRequest());
            // if ($response->response->statusCode == 1) then SUCCESS
            // if ($response->response->statusCode == 0) then FAILURE, check error code and description.
            // $response->response->errorCode
            // $response->response->description
        } catch (\Inkassogram\Bookkeeping\Exception\XsdValidationException $e) {
            // Do logging here ...
            echo 'Looks like we got an error: ' . $e->getMessage();
        } catch (\Exception $e) {
            // Do logging here ...
            echo 'Looks like we got an error: ' . $e->getMessage();
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
        $file = str_replace('\\', '/', rtrim(dirname(__FILE__), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR  . $class . '.php');
        if (file_exists($file)) {
            require $file;
        } else {
            return;
        }
    }
