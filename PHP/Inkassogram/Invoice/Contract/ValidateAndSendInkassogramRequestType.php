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
 * Class equivalent to XSD element ValidateAndSendInkassogramRequestType.
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class ValidateAndSendInkassogramRequestType extends AuthenticationType 
{
    /**
     * Invoices to activate.
     * array of OCR numbers
     * @var array string
     */
    private $invoices_to_activate;
    
    /**
     * Clearing and account number
     * @var string
     */
    private $clearing_and_account_number;
    
    /**
     * Social security number or organization number.
     * @var string
     */
    private $ssn;

	/** 
	 * Billing var that identificates the user
	 */
    private $billing_var2;
        
    

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/

    public function getSsn()
    {
        return $this->ssn;
    }
    
    public function setSsn($ssn)
    {
        $this->ssn = $ssn;
    }

    public function getInvoices_to_activate()
    {
        return $this->invoices_to_activate;
    }
    
    public function setInvoices_to_activate(array $invoices_to_activate)
    {
        $this->invoices_to_activate = $invoices_to_activate;
    }
    
    public function getBilling_var2()
    {
        return $this->billing_var2;
    }
    
    public function setBilling_var2($billing_var2)
    {
        $this->billing_var2 = $billing_var2;
    }
    
    public function getClearing_and_account_number()
    {
        return $this->clearing_and_account_number;
    }
    
    public function setClearing_and_account_number($clearing_and_account_number)
    {
        $this->clearing_and_account_number = $clearing_and_account_number;
    }
}
