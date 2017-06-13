<?php
/**
 * Inkassogram Invoice SOAP API Client
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
 
namespace Inkassogram\Invoice\Contract; 

/**
 * Class equivalent to XSD element ActivateInvoiceRequestType.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class BankIDSignRequestType extends AuthenticationType
{

  
    /**
     * Auth_and_collect 0/1, set as true if you won't use the method collect after this request 
     * @var bool
     */
    private $sign_and_collect;

    /**
     * ttl - Time to live, will just be in use if the auth and collect is set as true
     * @var int
     */
    private $ttl;
    
    /**
     * Social security number.
     * @var string
     */
    private $ssn;
    
    /**
     * The text being signed
     * @var string
     */
    private $text_to_sign;

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/

    /**
     * Returns the auth and collect.
     * @returns bool
     */
    public function getSign_and_collect()
    {
        return $sign_and_collect;
    }
    
    /**
     * Sets the auth and collect.
     * @param bool $auth_and_collect
     */
    public function setSign_and_collect($sign_and_collect)
    {
        $this->sign_and_collect = $sign_and_collect;
    }
    
    /**
     * Returns the time to live.
     * @returns int
     */
    public function getTtl()
    {
        return $ttl;
    }
    
    /**
     * Sets the time to live.
     * @param int $ttl
     */
    public function setTtl($ttl)
    {
        $this->ttl = $ttl;
    }
    
    /**
     * Returns the Social security number.
     * @returns string
     */
    public function getSsn() {
        return $this->ssn;
    }
    
    /**
     * Sets the Social security number.
     * @param string $ssn
     */
    public function setSsn($ssn)
    {
        $this->ssn = $ssn;
    }

    /**
     * Sets the $text_to_sign variable.
     * @var String $test_to_sign
     */
    public function setTextToSign($text_to_sign){
        $this->text_to_sign = $text_to_sign;
    }

    /**
     * Gets the $text_to_sign variable.
     * @return String $test_to_sign
     */
    public function getTextToSign(){
        return $this->text_to_sign;
    }
}
