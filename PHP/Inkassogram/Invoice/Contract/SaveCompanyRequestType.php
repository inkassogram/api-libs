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
 * Class equivalent to XSD element SaveCompanyRequestType.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class SaveCompanyRequestType extends AuthenticationType 
{

    /**
     * ?
     * @var bool
     */
    private $reseller_key;

    /**
     * Whether or not to perform a credit check.
     * If enabled (1), the customer has to be notified
     * and must be done with customer approval/consent.
     * If disabled (0), only information about the
     * customer is returned. This is currently ONLY
     * supported for Sweden.
     * @var int
     */
    private $company_name;

    /**
     * ?
     * @var bool
     */
    private $company_address;

    /**
     * The E-mail address to notify credit check.
     * @var string [optional]
     */
    private $company_zip;

    /**
     * Social security number or organization number.
     * @var string
     */
    private $company_city;

    /**
     * Either SWE, SWEDEN, NORWAY, DENMARK, or FINLAND.
     * Default Sweden if not set.
     * @var string [optional]
     */
    private $company_organization_number;

    /**
     * Bankgiro account for debt payments to customer
     */
    private $company_bg_account_number;

    /**
     * Plusgiro account for debt payments to customer
     */
    private $company_pg_account_number;

    /**
     * ?
     * @var bool
     */
    private $company_vat_number;

    /**
     * ?
     * @var bool
     */
    private $invoice_contact_phone;

    /**
     * ?
     * @var bool
     */
    private $invoice_contact_email;

    /**
     * ?
     * @var bool
     */
    private $invoice_contact_web;

    /**
     * ?
     * @var bool
     */
    private $invoice_logo;

    /**
     * ?
     * @var bool
     */
    private $invoice_static_text;

    /**
     * Enterprice system, Fortnox, Visma etc.
     * @var string
     */
    private $erp_system;

    /**
     * ?
     * @var bool
     */
    private $ip_address;

    /**
    * Specifies if the company accepts amortization.
    *
    * @var $boolean
    * @since v17.8
    */
    private $invoice_amortization_accepted;

    /**
    * Specifies the company's overdue interest
    *
    * @var $invoice_overdue_interest
    * @since v17.8
    */
    private $invoice_overdue_interest;

    /**
    * Specifies the company's yearly invoice volume
    *
    * @var $yearly_invoice_volume
    * @since v17.8
    */
    private $yearly_invoice_volume;

    /**
    * Specifies if the company is tax registered
    *
    * @var $company_tax_registered
    * @since v17.8
    */
    private $company_tax_registered;


    /********************************************************************************
     * Getters and setters
     *******************************************************************************/

    public function getCompany_name()
    {
        return $this->company_name;
    }

    public function setCompany_name($company_name)
    {
        $this->company_name = $company_name;
    }

    public function getCompany_address()
    {
        return $this->company_address;
    }

    public function setCompany_address($company_address)
    {
        $this->company_address = $company_address;
    }

    public function getCompany_zip()
    {
        return $this->company_zip;
    }

    public function setCompany_zip($company_zip)
    {
        $this->company_zip = $company_zip;
    }

    public function getCompany_city()
    {
        return $this->company_city;
    }

    public function setCompany_city($company_city)
    {
        $this->company_city = $company_city;
    }

    public function getCompany_organization_number()
    {
        return $this->company_organization_number;
    }

    public function setCompany_organization_number($company_organization_number)
    {
        $this->company_organization_number = $company_organization_number;
    }

    public function getCompany_vat_number()
    {
        return $this->company_vat_number;
    }

    public function setCompany_vat_number($company_vat_number)
    {
        $this->company_vat_number = $company_vat_number;
    }

    public function getCompany_bg_account_number()
    {
        return $this->company_bg_account_number;
    }

    public function setCompany_bg_account_number($company_bg_account_number)
    {
        $this->company_bg_account_number = $company_bg_account_number;
    }

    public function getCompany_pg_account_number()
    {
        return $this->company_pg_account_number;
    }

    public function setCompany_pg_account_number($company_pg_account_number)
    {
        $this->company_pg_account_number = $company_pg_account_number;
    }

    public function getInvoice_contact_phone()
    {
        return $this->invoice_contact_phone;
    }

    public function setInvoice_contact_phone($invoice_contact_phone)
    {
        $this->invoice_contact_phone = $invoice_contact_phone;
    }

    public function getInvoice_contact_email()
    {
        return $this->invoice_contact_email;
    }

    public function setInvoice_contact_email($invoice_contact_email)
    {
        $this->invoice_contact_email = $invoice_contact_email;
    }

    public function getInvoice_contact_web()
    {
        return $this->invoice_contact_web;
    }

    public function setInvoice_contact_web($invoice_contact_web)
    {
        $this->invoice_contact_web = $invoice_contact_web;
    }

    public function getInvoice_logo()
    {
        return $this->invoice_logo;
    }

    public function setInvoice_logo($invoice_logo)
    {
        $this->invoice_logo = $invoice_logo;
    }

    public function getInvoice_static_text()
    {
        return $this->invoice_static_text;
    }

    public function setInvoice_static_text($invoice_static_text)
    {
        $this->invoice_static_text = $invoice_static_text;
    }

    public function getReseller_key()
    {
        return $this->reseller_key;
    }

    public function setReseller_key($reseller_key)
    {
        $this->reseller_key = $reseller_key;
    }

    public function getErp_system()
    {
        return $this->erp_system;
    }

    public function setErp_system($erpSystem)
    {
        $this->erp_system = $erpSystem;
    }

    public function getIp_address()
    {
        return $this->ip_address;
    }

    public function setIp_address($ip_address)
    {
        $this->ip_address = $ip_address;
    }

    public function getInvoice_amortization_accepted()
    {
        return $this->invoice_amortization_accepted;
    }

    public function setInvoice_amortization_accepted($invoice_amortization_accepted)
    {
        $this->invoice_amortization_accepted = $invoice_amortization_accepted;
    }

     public function getInvoice_overdue_interest()
    {
        return $this->invoice_overdue_interest;
    }

    public function setInvoice_overdue_interest($invoice_overdue_interest)
    {
        $this->invoice_overdue_interest = $invoice_overdue_interest;
    }

    public function getYearly_invoice_volume()
    {
        return $this->yearly_invoice_volume;
    }

    public function setYearly_invoice_volume($yearly_invoice_volume)
    {
        $this->yearly_invoice_volume = $yearly_invoice_volume;
    }

    public function getCompany_tax_registered()
    {
        return $this->company_tax_registered;
    }

    public function setCompany_tax_registered($company_tax_registered)
    {
        $this->company_tax_registered = $company_tax_registered;
    }
}
