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
 * Class equivalent to the XML element CreditInvoiceRequestType.
 * <request ...></request>
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class CreditInvoiceRequestType
{

    /**
     * If "true": the credit will not be persisted.
     * For testing purposes only, e.g. Unit Tests.
     * @var string
     */
    private $isTestModeEnabled;
    
    /**
     * 1. E-faktura, PDF
     * 2. Printa själv
     * 3. Print on Demand
     * 4. SMS Faktura
     * @var int
     */
    private $printSetup;

    /**
     * Whether or not the price is with VAT included or not.
     * @var int
     */
    private $isVatIncluded;
    
    /**
     * The OCR number.
     * @var int
     */
    private $ocr;
    
    /**
     * The Order number.
     * @var string
     */
    private $orderNumber;
    
    /**
     * Include invoice footer text in the response.
     * @var int
     */
    private $showInvoiceFooterTextInResponse;
    
    /**
     * A comment included in the credit.
     * @var string
     */
    private $comment;
    
    /**
     * E-mail address if we shall send the credit invoice via E-mail.
     * @var string
     */
    private $emailAddress;
    
    /**
     * Mobile Phone Number, needed for SMS Faktura print setup 4.
     * Formatted as 46123456789, +46123456789.
     * @var string
     */
    private $mobilePhoneNumber;
    
    /**
     * All rows will be automatically credited.
     * @var int
     */
    private $creditAllInvoiceRows;
    
    /**
     * The credit rows.
     * @var array<CreditRowType>
     */
    private $creditRows;

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
     
    /**
     * @XmlElement testCredit
     */
    public function isTestModeEnabled()
    {
        return $this->isTestModeEnabled;
    }
    
    public function setIsTestModeEnabled($isTestModeEnabled)
    {
        $this->isTestModeEnabled = $isTestModeEnabled;
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
     * @XmlElement includingVat
     */
    public function isVatIncluded()
    {
        return $this->isVatIncluded;
    }

    public function setIsVatIncluded($isVatIncluded)
    {
        $this->isVatIncluded = $isVatIncluded;
        return $this;
    }
    
    /**
     * @XmlElement ocr
     */
    public function getOcr()
    {
        return $this->ocr;
    }

    public function setOcr($ocr)
    {
        $this->ocr = $ocr;
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
     * @XmlElement showInvoiceFooterTextInResponse
     */
    public function getShowInvoiceFooterTextInResponse()
    {
        return $this->showInvoiceFooterTextInResponse;
    }

    public function setShowInvoiceFooterTextInResponse($showInvoiceFooterTextInResponse)
    {
        $this->showInvoiceFooterTextInResponse = $showInvoiceFooterTextInResponse;
        return $this;
    }
    
    /**
     * @XmlElement comment
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
     * @XmlElement mobile
     */
    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }

    public function setMobilePhoneNumber($mobilePhoneNumber)
    {
        $this->mobilePhoneNumber = $mobilePhoneNumber;
        return $this;
    }
    
    /**
     * @XmlElement creditAllRows
     */
    public function getCreditAllInvoiceRows()
    {
        return $this->creditAllInvoiceRows;
    }

    public function setCreditAllInvoiceRows($creditAllInvoiceRows)
    {
        $this->creditAllInvoiceRows = $creditAllInvoiceRows;
        return $this;
    }
    
    /**
     * @XmlElement creditRows
     */
    public function getCreditRows()
    {
        return $this->creditRows;
    }

    public function setCreditRows(array $creditRows)
    {
        $this->creditRows = $creditRows;
        return $this;
    }
    
}
