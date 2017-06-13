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
 * Class equivalent to XSD element SaveUserToCompanyRequestType.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class SaveUserToCompanyRequestType extends AuthenticationType 
{

    /**
     * ?
     * @var bool
     */
    private $first_name;
    
    /**
     * Whether or not to perform a credit check.
     * If enabled (1), the customer has to be notified
     * and must be done with customer approval/consent.
     * If disabled (0), only information about the 
     * customer is returned. This is currently ONLY
     * supported for Sweden.
     * @var int
     */
    private $last_name;
    
    /**
     * ?
     * @var bool
     */
    private $mobile_number;
    
    /**
     * The E-mail address to notify credit check.
     * @var string [optional]
     */
    private $ssn;
    
    /**
     * Social security number or organization number.
     * @var string
     */
    private $email;
    

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
    
    public function getFirst_name()
    {
        return $this->first_name;
    }
    
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }
    
    public function getLast_name()
    {
        return $this->last_name;
    }
    
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }
    
    public function getMobile_number()
    {
        return $this->mobile_number;
    }
    
    public function setMobile_number($mobile_number)
    {
        $this->mobile_number = $mobile_number;
    }
    
    public function getSsn()
    {
        return $this->ssn;
    }
    
    public function setSsn($ssn)
    {
        $this->ssn = $ssn;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
