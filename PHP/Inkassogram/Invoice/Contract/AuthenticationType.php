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
 
namespace Includes\Inkassogram\Invoice\Contract; 

/**
 * SOAP request type base class.
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class AuthenticationType
{

    /**
     * The key is used to authenticate the request.
     * @var string
     */
    public $key;
    
    /**
     * The account to charge.
     * @var int
     */
    public $customerno;
    
    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
    
    /**
     * Returns the key.
     * @returns string
     */
    public function getKey()
    {
        return $this->key;
    }
    
    /**
     * Sets the key.
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }
    
    /**
     * Returns the customer number.
     * @returns int
     */
    public function getCustomerNo()
    {
        return $customerno;
    }
    
    /**
     * Sets the customer number.
     * @param int $customerno
     */
    public function setCustomerNo($customerno)
    {
        $this->customerno = $customerno;
    }
    
}
