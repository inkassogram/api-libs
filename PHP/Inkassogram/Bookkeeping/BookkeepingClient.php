<?php
/**
 * Inkassogram Bookkeeping API Client
 *
 * @author      Johan Sall Larsson <johan@inkassogram.se>
 * @author      Simon Stal <simon@inkassogram.se>
 * @copyright   2017 Inkassogram AB (publ)
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
 
namespace Inkassogram\Bookkeeping; 

/**
 * The Inkassogram Invoice Bookkeeping API client.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class BookkeepingClient
{

    /**
     * The customer number.
     * @var int
     */
    private $customerNumber;
    
    /**
     * The authorization token.
     * @var string
     */
    private $authToken;
    
    /**
     * The IP address.
     * @var string
     */
    private $ipAddress;
    
    /**
     * If the XML data should be validated
     * by the XSD file before the request.
     * @var bool
     */
    private $validateXsdBeforeRequest;
    
    /**
     * The XML data that is sent in the POST request.
     * @var string
     */
    private $lastRequest;
    
    /********************************************************************************
     * Public Functions
     *******************************************************************************/
    
    /**
     * Creates an invoice.
     * @param CreateInvoiceRequest $request
     */
    public function CreateInvoice(Contract\CreateInvoiceRequest $request)
    {
        return $this->sendRequest('https://api.inkassogram.se/API/createInvoiceBookkeeping', $request);
        //return $this->sendRequest('http://10.99.196.64/inkassogram.se/www.inkassogram.se/API/createInvoiceBookkeeping', $request);
    }
    
    /**
     * Creates an invoice.
     * @param CreditInvoiceRequest $request
     */
    public function CreditInvoice(Contract\CreditInvoiceRequest $request)
    {
        return $this->sendRequest('https://api.inkassogram.se/API/creditInvoice', $request);
    }
     
    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
     
    /**
     * Returns the customer number.
     * @return int
     */
    public function getCustomerNumber()
    {
        return $this->customerNumber;
    }
    
    /**
     * Sets the customer number.
     * @return this
     */
    public function setCustomerNumber($customerNumber)
    {
        $this->customerNumber = $customerNumber;
        return $this;
    }
    
    /**
     * Returns the authorization token.
     * @return string
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }
    
    /**
     * Sets the authorization token.
     * @return this
     */
    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
        return $this;
    }
    
    /**
     * Returns the IP address.
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }
    
    /**
     * Sets the IP address.
     * @param this
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }
    
    /**
     * Returns the validate XML data before request.
     * @return bool
     */
    public function getValidateXsdBeforeRequest()
    {
        return $this->validateXsdBeforeRequest;
    }
    
    /**
     * Sets the validate XML data before request.
     * @param  bool $validateXsdBeforeRequest
     * @return this
     */
    public function setValidateXsdBeforeRequest($validateXsdBeforeRequest)
    {
        $this->validateXsdBeforeRequest = $validateXsdBeforeRequest;
        return $this;
    }
    
    /**
     * Returns the XML data in the POST request.
     * @return string
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }
    
    /**
     * Sets the XML data in the POST request.
     * @param string $lastRequest
     */
    private function setLastRequest($lastRequest)
    {
        $this->lastRequest = $lastRequest;
    }
    
    /********************************************************************************
     * Private Functions
     *******************************************************************************/
     
    /**
     * Sends the POST request.
     * @param    string                $serviceUrl
     * @param    object                $obj
     * @return   SimpleXMLElement
     */
    private function sendRequest($serviceUrl, $obj)
    {
        $serializer = new \Inkassogram\Bookkeeping\Serializer\XmlSerializer();
        $xmlDoc = $serializer->serialize($obj);
        $post = $xmlDoc->asXML();
        $this->setLastRequest($post);        
        if ($this->getValidateXsdBeforeRequest()) {
            $this->validateXsd($xmlDoc, $post);
        }
        $ch = curl_init();
        curl_setopt_array($ch, array( 
            CURLOPT_POST => 1, 
            CURLOPT_HEADER => 0, 
            CURLOPT_URL => $serviceUrl, 
            CURLOPT_FRESH_CONNECT => 1, 
            CURLOPT_RETURNTRANSFER => 1, 
            CURLOPT_FORBID_REUSE => 1, 
            CURLOPT_TIMEOUT => 9, 
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: text/xml', 
                sprintf('customerNo: %s', $this->getCustomerNumber()), 
                sprintf('key: %s', md5($this->getIpAddress() . date('Ymd') . $this->getAuthToken())), 
                sprintf('Content-length: %s', strlen($post))
            )
        ));
        if (! $result = curl_exec($ch)) { 
            trigger_error(curl_error($ch)); 
        } 
        curl_close($ch); 
        $retval = simplexml_load_string($result);
        return $retval;
    }
    
    /**
     * Validates the XML by XSD schema.
     * @param    SimpleXMLElement        $xmlDoc
     * @param    string                  $data
     * @throws   XsdValidationException
     */
    private function validateXsd($xmlDoc, $data)
    {
        $attr = $xmlDoc->attributes();
        $schemaLocation = explode(' ', $attr["schemaLocation"]);
        $doc = new \DomDocument;
        $doc->loadXML($data);
        libxml_use_internal_errors(true);
        if (!$doc->schemaValidate($schemaLocation[1])) {
            return true;
        } else {
            $errors = libxml_get_errors();
            throw new \Inkassogram\Bookkeeping\Exception\XsdValidationException("XSD validation failed!\n\n" . var_export(error_get_last(), true));
        }
    }
    
}
