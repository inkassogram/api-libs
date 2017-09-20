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
 * Class equivalent to XSD element PauseInvoiceRequestType.
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class PauseInvoiceRequestType extends AuthenticationType
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
     * To pause the invoice. Defaults to false.
     * @var bool [optional]
     */
    private $pause;
    
    /**
     * Whether or not to send out reminders.
     * @var bool [optional]
     */
    private $skip_reminder;
    
    /**
     * Whether or not to send out debt collection.
     * @var bool [optional]
     */
    private $skip_debt_collection;

    /**
     * Alters the invoice due date.
     * @var string [yyyyMMdd][optional]
     */
    private $invoice_due_date;
    
    /**
     * Alters the reminder due date.
     * @var string [yyyyMMdd][optional]
     */
    private $reminder_due_date;

    /**
     * Alters the debt collection due date.
     * @var string [yyyyMMdd][optional]
     */
    private $debt_collection_due_date;
    
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
     * Returns whether or not to pause the invoice.
     * @returns bool
     */
    public function getPause()
    {
        return $this->pause;
    }
    
    /**
     * Sets whether or not to pause the invoice.
     * @param bool $pause
     */
    public function setPause($pause)
    {
        $this->pause = $pause;
    }
    
    /**
     * Returns whether or not to skip reminders.
     * @returns bool
     */
    public function getSkip_reminder()
    {
        return $this->skip_reminder;
    }
    
    /**
     * Sets whether or not to skip reminders.
     * @param bool $skip_reminder
     */
    public function setSkip_reminder($skip_reminder)
    {
        $this->skip_reminder = $skip_reminder;
    }
    
    /**
     * Returns whether or not to debt collection.
     * @returns bool
     */
    public function getSkip_debt_collection()
    {
        return $this->skip_debt_collection;
    }
    
    /**
     * Sets whether or not to debt collection.
     * @param bool $skip_debt_collection
     */
    public function setSkip_debt_collection($skip_debt_collection)
    {
        $this->skip_debt_collection = $skip_debt_collection;
    }
    
    /**
     * Returns the invoice due date.
     * @returns string
     */
    public function getInvoice_due_date() {
        return $this->invoice_due_date;
    }
    
    /**
     * Sets the invoice due date.
     * @param string $invoice_due_date
     */
    public function setInvoice_due_date($invoice_due_date)
    {
        $this->invoice_due_date = $invoice_due_date;
    }
    
    /**
     * Returns the reminder due date.
     * @returns string
     */
    public function getReminder_due_date()
    {
        return $this->reminder_due_date;
    }
    
    /**
     * Sets the reminder due date.
     * @param string $reminder_due_date
     */
    public function setReminder_due_date($reminder_due_date)
    {
        $this->reminder_due_date = $reminder_due_date;
    }
    
    /**
     * Returns the debt collection due date.
     * @returns string
     */
    public function getDebt_collection_due_date()
    {
        return $this->debt_collection_due_date;
    }
    
    /**
     * Sets the the debt collection due date.
     * @param string $debt_collection_due_date
     */
    public function setDebt_collection_due_date($debt_collection_due_date)
    {
        $this->debt_collection_due_date = $debt_collection_due_date;
    }
    
}
