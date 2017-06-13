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
 * Class equivalent to XSD element RegisterPaymentRequestType.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class RegisterPaymentRequestType extends AuthenticationType
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
     * payment_amount
     * @var int
     */
    private $payment_amount;
    
    /**
     * date, date when payment occured format, YYYY-MM-DD
     * @var string
     */
    private $date;
    
    /**
     * close_case
     */
     private $close_case;
     
    
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
     * Returns the payment amount
     * @returns int
     */
    public function getPayment_amount()
    {
        return $this->payment_amount;
    }
    
    /**
     * Sets the payment amount
     * @param int $payment_amount
     */
    public function setPayment_amount($payment_amount)
    {
        $this->payment_amount = $payment_amount;
    }
    
    /**
     * Returns the date.
     * @returns string
     */
    public function getDate() {
        return $this->date;
    }
    
    /**
     * Sets the date.
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Returns the close_case
     * @returns boolean
     */
    public function getClose_case() {
        return $this->close_case;
    }
    
    /**
     * Sets the close_case.
     * @param boolean $close_case
     */
    public function setClose_case($close_case)
    {
        $this->close_case = $close_case;
    }
}
