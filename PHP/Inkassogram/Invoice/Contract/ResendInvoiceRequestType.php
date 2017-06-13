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
 
namespace Includes\Inkassogram\Invoice\Contract; 

/**
 * Class equivalent to XSD element ResendInvoiceRequestType.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class ResendInvoiceRequestType extends AuthenticationType
{

    /**
     * The order number / transaction number sent to 
     * Inkassogram when the invoice was created.
     * Optional ONLY IF $ocr is set.
     * @var string
     */
    private $order_no;
    
    /**
     * The OCR number received in the response when the 
     * invoice was created. 
     * Optional ONLY IF $order_no is set.
     * @var int
     */
    private $ocr;
    
    /**
     * 1 - Resend invoice
     * 2 - Resend reminder
     * 3 - Resend debt collection
     * 4 - Resend refund.
     * @var int
     */
    private $invoice_state;
    
    /**
     * 1 - E-faktura, PDF
     * 3 - Print on Demand
     * 4 - SMS Faktura.
     * @var int
     */
    private $print_setup;
    
    /**
     * The E-mail address where the invoice
     * is to be sent for $print_setup 1.
     * @var string
     */
    private $email;

    /**
     * The mobile phone number where the invoice
     * is to be sent.
     * @var string
     */
    private $mobile;
    
    /**
     * Clears all C/O address lines before
     * setting any address lines.
     * @var bool
     */
    private $clear_co_address;

    /**
     * (?) The E-mail address where the invoice
     * is to be sent for $print_setup 1.
     * @var string
     */
    private $co_email;
    
    /**
     * C/O address line 1.
     * @var string
     */
    private $co_address1;
    
    /**
     * C/O address line 2.
     * @var string
     */
    private $co_address2;
    
    /**
     * C/O address line 3.
     * @var string
     */
    private $co_address3;
    
    /**
     * C/O address line 4.
     * @var string
     */
    private $co_address4;
    
    /**
     * C/O address line 5.
     * @var string
     */
    private $co_address5;
    
    /**
     * This value will be visible on the invoice as an order number.
     * @var string
     */
    private $invoice_reference;

    /**
     * The reference number of the order made from the end customer. 
     * Will be visible on the invoice for the end customer.
     * @var string
     */
    private $invoice_order_no;
     
     /**
     * Visible as Our Reference.
     * @var string
     */
    private $our_reference;
     
     /**
     * Visible as Your Reference.
     * @var string
     */
    private $your_reference;
    
    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
    
    /**
     * Returns the order number.
     * @returns string
     */
    public function getOrder_no()
    {
        return $order_no;
    }
    
    /**
     * Sets the order number.
     * @param string $order_no
     */
    public function setOrder_no($order_no)
    {
        $this->order_no = $order_no;
    }
    
    /**
     * Returns the ocr.
     * @returns int
     */
    public function getOcr()
    {
        return $this->ocr;
    }
    
    /**
     * Sets the ocr.
     * @param int $ocr
     */
    public function setOcr($ocr)
    {
        $this->ocr = $ocr;
    }
    
    /**
     * Returns the invoice state.
     * @returns int
     */
    public function getInvoice_state()
    {
        return $this->invoice_state;
    }
    
    /**
     * Sets the invoice state.
     * @param int $invoice_state
     */
    public function setInvoice_state($invoice_state)
    {
        $this->invoice_state = $invoice_state;
    }
    
    /**
     * Returns the print setup.
     * @returns int
     */
    public function getPrint_setup()
    {
        return $this->print_setup;
    }
    
    /**
     * Sets the print setup.
     * @param int $print_setup
     */
    public function setPrint_setup($print_setup)
    {
        $this->print_setup = $print_setup;
    }
    
    /**
     * Returns the E-mail address.
     * @returns string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the E-mail address.
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the mobile phone number.
     * @returns string
     */
    public function getMobile()
    {
        return $this->mobile;
    }
    
    /**
     * Sets the mobile phone number.
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }
    
    /**
     * Returns whether or not to clear all c/o address lines.
     * @returns bool
     */
    public function getClear_co_address()
    {
        return $this->clear_co_address;
    }
    
    /**
     * Sets whether or not to clear all c/o address lines.
     * @param bool $clear_co_address
     */
    public function setClear_co_address($clear_co_address)
    {
        $this->clear_co_address = $clear_co_address;
    }
    
    /**
     * Returns the c/o E-mail address.
     * @returns string
     */
    public function getCo_email()
    {
        return $this->co_email;
    }
    
    /**
     * Sets the c/o E-mail address.
     * @param string $co_email
     */
    public function setCo_email($co_email)
    {
        $this->co_email = $co_email;
    }
    
    /**
     * Returns the c/o address line 1.
     * @returns string
     */
    public function getCo_address1()
    {
        return $this->co_address1;
    }
    
    /**
     * Sets the c/o address line 1.
     * @param string $co_address1
     */
    public function setCo_address1($co_address1)
    {
        $this->co_address1 = $co_address1;
    }
    
    /**
     * Returns the c/o address line 2.
     * @returns string
     */
    public function getCo_address2()
    {
        return $this->co_address2;
    }
    
    /**
     * Sets the c/o address line 2.
     * @param string $co_address2
     */
    public function setCo_address2($co_address2)
    {
        $this->co_address2 = $co_address2;
    }
    
    /**
     * Returns the c/o address line 3.
     * @returns string
     */
    public function getCo_address3()
    {
        return $this->co_address3;
    }
    
    /**
     * Sets the c/o address line 3.
     * @param string $co_address3
     */
    public function setCo_address3($co_address3)
    {
        $this->co_address3 = $co_address3;
    }
    
    /**
     * Returns the c/o address line 4.
     * @returns string
     */
    public function getCo_address4()
    {
        return $this->co_address4;
    }
    
    /**
     * Sets the c/o address line 4.
     * @param string $co_address4
     */
    public function setCo_address4($co_address4)
    {
        $this->co_address4 = $co_address4;
    }
    
    /**
     * Returns the c/o address line 5.
     * @returns string
     */
    public function getCo_address5()
    {
        return $this->co_address5;
    }
    
    /**
     * Sets the c/o address line 5.
     * @param string $co_address5
     */
    public function setCo_address5($co_address5)
    {
        $this->co_address5 = $co_address5;
    }
    
    /**
     * Returns the invoice reference.
     * @returns string
     */
    public function getInvoice_reference()
    {
        return $this->invoice_reference;
    }
    
    /**
     * Sets the invoice reference.
     * @param string $invoice_reference
     */
    public function setInvoice_reference($invoice_reference)
    {
        $this->invoice_reference = $invoice_reference;
    }
    
    /**
     * Returns the invoice order number.
     * @returns string
     */
    public function getInvoice_order_no()
    {
        return $this->invoice_order_no;
    }
    
    /**
     * Sets the invoice order number.
     * @param string $invoice_order_no
     */
    public function setInvoice_order_no($invoice_order_no)
    {
        $this->invoice_order_no = $invoice_order_no;
    }
    
    /**
     * Returns our reference.
     * @returns string
     */
    public function getOur_reference()
    {
        return $this->our_reference;
    }
    
    /**
     * Sets our reference.
     * @param string $our_reference
     */
    public function setOur_reference($our_reference)
    {
        $this->our_reference = $our_reference;
    }
    
    /**
     * Returns your reference.
     * @returns string
     */
    public function getYour_reference()
    {
        return $this->your_reference;
    }
    
    /**
     * Sets your reference.
     * @param string $your_reference
     */
    public function setYour_reference($your_reference)
    {
        $this->your_reference = $your_reference;
    }
    
}
