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
 * Class equivalent to XSD element SearchInvoicesRequestType.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class SearchInvoicesRequestType extends AuthenticationType
{

    /**
     * The OCR number received in the response when the
     * invoice was created.
     * Optional ONLY IF $order_no is set.
     * @var int
     */
    private $ocr;

    /**
     * An organization number to be used when searching.
     * @var string
     */
    private $organization_number;

    /**
     * A social security number to be used when searching.
     * @var string
     */
    private $ssn;

    private $company_organization_number;

    private $receiver_name;

    private $company_name;

    /**
    * Specifies the number of hits allowed
    * @var string
    */
    private $number_hits;

    /**
     * Payment status
     * @var ENUM of (PAID, UNPAID, PART_PAID, CREDITED, RESERVED, UNPAID_AND_NOT_PAST_DUE_DATE, UNPAID_AND_PAST_DUE_DATE, UNPAID_AND_PAST_DEBT_COLLECTION_DUE_DATE, UNPAID_COLLECTION_FEES_AND_INJUCTION_NOT_ACCEPTED_BY_CUSTOMER, UNPAID_WITH_CAPITAL_AND_INJUCTION_NOT_ACCEPTED_BY_CUSTOMER or UNPAID_AND_INJUCTION_SENT)
     */
    private $payment_status;

    private $billing_var2;

    private $date_from;
    private $date_to;

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/

    /**
     * @returns int
     */
    public function getOcr()
    {
        return $this->ocr;
    }

    /**
     * @param int $ocr
     */
    public function setOcr($ocr)
    {
        $this->ocr = $ocr;
    }

    /**
     * @returns int
     */
    public function getOrganizationNumber()
    {
        return $this->organization_number;
    }

    /**
     * @param int $organization_number
     */
    public function setOrganizationNumber($organization_number)
    {
        $this->organization_number = $organization_number;
    }

    /**
     * @return string
     */
    public function getSsn()
    {
        return $this->ssn;
    }

    /**
     * @param string $ssn
     */
    public function setSsn($ssn)
    {
        $this->ssn = $ssn;
    }

    /**
     * @return mixed
     */
    public function getCompanyOrganizationNumber()
    {
        return $this->company_organization_number;
    }

    /**
     * @param mixed $company_organization_number
     */
    public function setCompanyOrganizationNumber($company_organization_number)
    {
        $this->company_organization_number = $company_organization_number;
    }

    /**
     * @return mixed
     */
    public function getReceiverName()
    {
        return $this->receiver_name;
    }

    /**
     * @param mixed $receiver_name
     */
    public function setReceiverName($receiver_name)
    {
        $this->receiver_name = $receiver_name;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->company_name;
    }

    /**
     * @param mixed $company_name
     */
    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }

    /**
    * Sets the number of hits allowed. (default is 20)
    *
    * @var String $number_hits The number of hits
    * @return null
    */
    public function setNumberHits($number_hits){
        $this->number_hits = $number_hits;
    }

    /**
    * Gets the number of hits.
    *
    * @return String $number_hits The number of hits | null
    */
    public function getNumberHits(){
        return $this->number_hits;
    }

    /**
     * Returns the payment status
     * @returns string
     */
    public function getPaymentStatus()
    {
        return $this->payment_status;
    }

    /**
     * Sets the payment status
     * @param string $payment_status
     */
    public function setPaymentStatus($payment_status)
    {
        $this->payment_status = $payment_status;
    }

    /**
     * Returns the billing var2
     * @returns string
     */
    public function getBillingVar2()
    {
        return $this->billing_var2;
    }

    /**
     * Sets the billing var2
     * @param string $billing_var2
     */
    public function setBillingVar2($billing_var2)
    {
        $this->billing_var2 = $billing_var2;
    }

    /**
     * @returns date YYYY-MM-DD
     */
    public function getDateFrom()
    {
        return $this->date_from;
    }

    /**
     * @param string $date YYYY-MM-DD
     */
    public function setDateFrom($date)
    {
        $this->date_from = $date;
    }

    /**
     * @returns date YYYY-MM-DD
     */
    public function getDateTo()
    {
        return $this->date_to;
    }

    /**
     * @param string $date YYYY-MM-DD
     */
    public function setDateTo($date)
    {
        $this->date_to = $date;
    }

}
