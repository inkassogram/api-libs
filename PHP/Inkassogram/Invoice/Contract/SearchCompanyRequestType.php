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
 * Class equivalent to XSD element SearchCompanyRequestType.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class SearchCompanyRequestType extends AuthenticationType
{

    /**
     * A company name such as “Volvo”
     * @var string
     */
    private $company_name;

    /**
     * A company organization number
     * @var string
     */
    private $organization_number;
    
    /**
     * A search for "Berasy" with $phonetic_search TRUE
     * will yield in a result including "Inkassogram".
     * @var bool
     */
    private $phonetic_search;
    
    /**
     * ?
     * @var string [optional]
     */
    private $country;
    
    /**
     * Maximum number of hits. Minimum 1 and maximum 40.
     * @var int
     */
    private $number_hits;
    
    
    /********************************************************************************
     * Getters and setters
     *******************************************************************************/

    /**
     * Returns the company name.
     * @returns string
     */
    public function getCompany_name()
    {
        return $company_name;
    }
    
    /**
     * Sets the company name.
     * @param string $company_name
     */
    public function setCompany_name($company_name)
    {
        $this->company_name = $company_name;
    }
    
    /**
     * Returns the organization number.
     * @returns string
     */
    public function getOrganization_number()
    {
        return $organization_number;
    }
    
    /**
     * Sets the organization number.
     * @param string $organization_number
     */
    public function setOrganization_number($organization_number)
    {
        $this->organization_number = $organization_number;
    }
    
    /**
     * Returns whether or not to use phonetic search.
     * @returns bool
     */
    public function getPhonetic_search() {
        return $this->phonetic_search;
    }
    
    /**
     * Sets whether or not to use phonetic search.
     * @param bool $phonetic_search
     */
    public function setPhonetic_search($phonetic_search)
    {
        $this->phonetic_search = $phonetic_search;
    }
    
    /**
     * Returns the country.
     * @returns string
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    /**
     * Sets the country.
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }
    
    /**
     * Returns the maximum number of hits.
     * @returns int
     */
    public function getNumber_hits()
    {
        return $this->number_hits;
    }
    
    /**
     * Sets the maximum number of hits.
     * @param bool $number_hits
     */
    public function setNumber_hits($number_hits)
    {
        $this->number_hits = $number_hits;
    }
    
}
