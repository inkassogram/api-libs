<?php
/**
 * Inkassogram Invoice SOAP API Client
 *
 * @author      Inkassogram <dev@inkassogram.se>
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
 * Class equivalent to XSD element SsnCheckRequestType.
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class SsnCheckRequestType extends AuthenticationType
{

    /**
     * Whether or not to perform a credit check.
     * If enabled (1), the customer has to be notified
     * and must be done with customer approval/consent.
     * If disabled (0), only information about the
     * customer is returned. This is currently ONLY
     * supported for Sweden.
     * @var int
     */
    private $credit_check;

    /**
     * ?
     * @var bool
     */
    private $get_company;

    /**
     * The E-mail address to notify credit check.
     * @var string [optional]
     */
    private $email;

    /**
     * Social security number or organization number.
     * @var string
     */
    private $ssn;

    /**
     * Either SWE, SWEDEN, NORWAY, DENMARK, or FINLAND.
     * Default Sweden if not set.
     * @var string [optional]
     */
    private $country;

    /**
     * ?
     * @var bool
     */
    private $test;

    /**
     * Client IP address / remote ip address of user
     * @var string
     */
    private $client_ip;

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/

    public function getCredit_check()
    {
        return $this->credit_check();
    }

    public function setCredit_check($credit_check)
    {
        $this->credit_check = $credit_check;
    }

    public function getGet_company()
    {
        return $this->get_company();
    }

    public function setGet_company($get_company)
    {
        $this->get_company = $get_company;
    }

    public function getEmail()
    {
        return $this->email();
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSsn()
    {
        return $this->ssn();
    }

    public function setSsn($ssn)
    {
        $this->ssn = $ssn;
    }

    public function getCountry()
    {
        return $this->country();
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getTest()
    {
        return $this->test();
    }

    public function setTest($test)
    {
        $this->test = $test;
    }

    /**
     * Returns the client ip address
     * @returns string
     */
    public function getClient_ip()
    {
        return $this->client_ip;
    }

    /**
     * Sets the client ip address
     * @param bool $client_ip
     */
    public function setClient_ip($client_ip)
    {
        $this->client_ip = $client_ip;
    }
}
