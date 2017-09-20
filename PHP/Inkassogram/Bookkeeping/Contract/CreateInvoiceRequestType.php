<?php
/**
 * Inkassogram Bookkeeping API Client
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
 
 namespace Inkassogram\Bookkeeping\Contract; 

/**
 * Class equivalent to the XML element RequestType.
 * <request ...></request>
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class CreateInvoiceRequestType
{

    /**
     * If "true" the invoice won't persist any invoice.
     * @var string
     */
    private $isTestModeEnabled;

    /**
     * If 1 the invoice will NOT be sent to the customer
     * until activation, see activate_invoice.
     * @var int
     */
    private $makeInvoiceReservation;

    /**
     * Force to send invoice even though the end user has got a bad credit rate.
     * Suitable for use with errorCode 116, 117 120 and 121.
     * @var int
     */
    private $forceToSend;

    /**
     * 1. Fakturaservice
     * 2. Fakturabelåning
     * 3. Factoring
     * @var int
     */
    private $service;

    /**
     * 1. E-faktura, PDF
     * 2. Printa själv
     * 3. Print on Demand
     * 4. SMS Faktura
     * @var int
     */
    private $printSetup;

    /**
     * ENUM
     * invoice
     * reminder
     * debtCollection
     * @var string
     */
    private $sendAs;

    /**
     * Social Security Number, Organization Number, or a 32 character auth key (ONLY for WAP Purchase API).
     * @var string
     */
    private $ssn;

    /**
     * ?
     * @var int
     */
    private $sendToOrganization;

    /**
     * Used to send invoices to other countries.
     * @var ForeignCustomerType
     */
    private $foreignCustomer;

    /**
     * To send the invoice to another address instead of the company address
     * @var CareOfAddressType
     */
    private $careOfAddress;

    /**
     * This value will be visible on the invoice as an order number.
     * @var string
     */
    private $invoiceReference;

    /**
     * The reference number of the order made from the end customer.
     * Will be visible on the invoice for the end customer.
     * @var string
     */
    private $invoiceOrderNo;

    /**
     * Shipping fee for an order. This value will be added as an invoice row.
     * @var int
     */
    private $shippingFee;

    /**
     * Expedition fee. This value will be added as an invoice row.
     * @var int
     */
    private $expeditionFee;

    /**
     * Date when the invoice shall be sent to the receiver.
     * @var int
     */
    private $invoiceDate;

    /**
    * Invoice Due Date in Unixtime format.
    * @var float
    */
    private $invoiceDueDate;

    /**
     * overdue interest for late payments
     * @var float
     */
    private $overdueInterest;

    /**
     * Amortization plan can be inited by debtor true/false
     * @var int
     */
    private $amortization;

    /**
     * ?
     * @var string
     */
    private $clientIpAddress;

    /**
     * URL for callback trigger when invoice has been changed or a payment is received.
     * @var string
     */
    private $callbackUrl;

    /**
     * Mobile Phone Number
     * @var string
     */
    private $mobile;

    /**
     * Email Address.
     * @var string
     */
    private $emailAddress;

    /**
     * Order Number, must be unique for each invoice and should be an internal value.
     * Used to get the status or credit the invoice.
     * @var string
     */
    private $orderNumber;

    /**
     * Visible as Our Reference.
     * @var string
     */
    private $ourReference;

    /**
     * Visible as Your Reference.
     * @var string
     */
    private $yourReference;

    /**
     * The invoice rows.
     * @var array
     */
    private $invoiceRows;

    /**
     * Add an invoice Comment for the end user. Visible below the article rows on the invoice.
     * @var string
     */
    private $comment;

    /**
     * Discount percentage of the total invoice amount.
     * @var int
     */
    private $discount;

    /**
     * The billing variable (?).
     * @var string
     */
    private $billingVar;

    /**
     * The attachedDocument (base64_encoded document).
     * @var string
     */
    private $attachedDocument;

    /**
     * The attachedDocumentMd5 variable (It's an md5 sum of the attached document in binary).
     * @var string
     */
    private $attachedDocumentMd5;

    /**
    * If automatic injunction should be activated for the invoice.
    * @var int
    */
    private $injunctionAcceptedByCustomer;

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/

    /**
     * @XmlElement testInvoice
     */
    public function isTestModeEnabled()
    {
        return $this->isTestModeEnabled;
    }

    public function setIsTestModeEnabled($isTestModeEnabled)
    {
        $this->isTestModeEnabled = $isTestModeEnabled;
        return $this;
    }

    /**
     * @XmlElement makeInvoiceReservation
     */
    public function getMakeInvoiceReservation()
    {
        return $this->makeInvoiceReservation;
    }

    public function setMakeInvoiceReservation($makeInvoiceReservation)
    {
        $this->makeInvoiceReservation = $makeInvoiceReservation;
        return $this;
    }

    /**
     * @XmlElement forceToSend
     */
    public function getForceToSend()
    {
        return $this->forceToSend;
    }

    public function setForceToSend($forceToSend)
    {
        $this->forceToSend = $forceToSend;
        return $this;
    }

    /**
     * @XmlElement service
     */
    public function getService()
    {
        return $this->service;
    }

    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @XmlElement printSetup
     */
    public function getPrintSetup()
    {
        return $this->printSetup;
    }

    public function setPrintSetup($printSetup)
    {
        $this->printSetup = $printSetup;
        return $this;
    }

    /**
     * @XmlElement sendAs
     */
    public function getSendAs()
    {
        return $this->sendAs;
    }

    public function setSendAs($sendAs)
    {
        $this->sendAs = $sendAs;
        return $this;
    }

    /**
     * @XmlElement ssn
     */
    public function getSsn()
    {
        return $this->ssn;
    }

    public function setSsn($ssn)
    {
        $this->ssn = $ssn;
        return $this;
    }

    /**
     * @XmlElement send_to_organization
     */
    public function getSendToOrganization()
    {
        return $this->sendToOrganization;
    }

    public function setSendToOrganization($sendToOrganization)
    {
        $this->sendToOrganization = $sendToOrganization;
        return $this;
    }

    /**
     * @XmlElement foreignCustomer
     */
    public function getForeignCustomer()
    {
        return $this->foreignCustomer;
    }

    public function setForeignCustomer(ForeignCustomerType $foreignCustomer)
    {
        $this->foreignCustomer = $foreignCustomer;
        return $this;
    }

    /**
     * @XmlElement careOfAddress
     */
    public function getCareOfAddress()
    {
        return $this->careOfAddress;
    }

    public function setCareOfAddress(CareOfAddressType $careOfAddress)
    {
        $this->careOfAddress = $careOfAddress;
        return $this;
    }

    /**
     * @XmlElement invoiceRef
     */
    public function getInvoiceReference()
    {
        return $this->invoiceReference;
    }

    public function setInvoiceReference($invoiceReference)
    {
        $this->invoiceReference = $invoiceReference;
        return $this;
    }

    /**
     * @XmlElement invoiceOrderNo
     */
    public function getInvoiceOrderNo() {
        return $this->invoiceOrderNo;
    }

    public function setInvoiceOrderNo($invoiceOrderNo) {
        $this->invoiceOrderNo = $invoiceOrderNo;
        return $this;
    }

    /**
     * @XmlElement shippingFee
     */
    public function getShippingFee()
    {
        return $this->shippingFee;
    }

    public function setShippingFee($shippingFee)
    {
        $this->shippingFee = $shippingFee;
        return $this;
    }

    /**
     * @XmlElement expFee
     */
    public function getExpeditionFee()
    {
        return $this->expeditionFee;
    }

    public function setExpeditionFee($expeditionFee)
    {
        $this->expeditionFee = $expeditionFee;
        return $this;
    }

    /**
     * @XmlElement invoiceDate
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate($invoiceDate)
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    /**
     * @XmlElement dueDate
     */
    public function getInvoiceDueDate()
    {
        return $this->invoiceDueDate;
    }

    public function setInvoiceDueDate($invoiceDueDate)
    {
        $this->invoiceDueDate = $invoiceDueDate;
        return $this;
    }

    /**
     * @XmlElement overdueInterest
     */
    public function getOverdueInterest()
    {
        return $this->overdueInterest;
    }

    public function setOverdueInterest($overdueInterest)
    {
        $this->overdueInterest = $overdueInterest;
        return $this;
    }

    /**
     * @XmlElement injunctionAcceptedByCustomer
     */
    public function getInjunctionAcceptedByCustomer()
    {
        return $this->injunctionAcceptedByCustomer;
    }

    public function setInjunctionAcceptedByCustomer($injunctionAcceptedByCustomer)
    {
        $this->injunctionAcceptedByCustomer = $injunctionAcceptedByCustomer;
    }

    /**
     * @XmlElement amortization
     */
    public function getAmortization()
    {
        return $this->amortization;
    }

    public function setAmortization($amortization)
    {
        $this->amortization = $amortization;
        return $this;
    }

    /**
     * @XmlElement clientIp
     */
    public function getClientIpAddress()
    {
        return $this->clientIpAddress;
    }

    public function setClientIpAddress($clientIpAddress)
    {
        $this->clientIpAddress = $clientIpAddress;
        return $this;
    }

    /**
     * @XmlElement callback
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
        return $this;
    }

    /**
     * @XmlElement mobile
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @XmlElement email
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @XmlElement orderNo
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    /**
     * @XmlElement ourRef
     */
    public function getOurReference()
    {
        return $this->ourReference;
    }

    public function setOurReference($ourReference)
    {
        $this->ourReference = $ourReference;
        return $this;
    }

    /**
     * @XmlElement yourRef
     */
    public function getYourReference()
    {
        return $this->yourReference;
    }

    public function setYourReference($yourReference)
    {
        $this->yourReference = $yourReference;
        return $this;
    }

    /**
     * @XmlElement invoiceRows
     */
    public function getInvoiceRows()
    {
        return $this->invoiceRows;
    }

    public function setInvoiceRows(array $invoiceRows)
    {
        $this->invoiceRows = $invoiceRows;
        return $this;
    }

    /**
     * @XmlElement comments
     */
    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @XmlElement discount
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @XmlElement billingVar
     */
    public function getBillingVar()
    {
        return $this->billingVar;
    }

    public function setBillingVar($billingVar)
    {
        $this->billingVar = $billingVar;
        return $this;
    }

    /**
     * @XmlElement attachedDocument
     */
    public function getAttachedDocument()
    {
        return $this->attachedDocument;
    }

    public function setAttachedDocument($attachedDocument)
    {
        $this->attachedDocument = $attachedDocument;
        return $this;
    }

    /**
     * @XmlElement attachedDocumentMd5
     */
    public function getAttachedDocumentMd5()
    {
        return $this->attachedDocumentMd5;
    }

    public function setAttachedDocumentMd5($attachedDocumentMd5)
    {
        $this->attachedDocumentMd5 = $attachedDocumentMd5;
        return $this;
    }
}
