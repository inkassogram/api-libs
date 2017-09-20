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
 * Class equivalent to the XML element ForeignCustomerType.
 * <foreignCustomer ...></foreignCustomer>
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class ForeignCustomerType
{

    /**
     * Sweden/Norway/Denmark/Finland - Countries which are supported with "ssn_check".
     * @var string
     */
    private $country;

    /**
     * Special agreement is needed in order to use this option.
     * @var CountryWithoutSsnCheckType
     */
    private $countryWithoutSsnCheck;
    
    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
     
    /**
     * @XmlElement country
     */
    public function getCountry()
    {
        return $this->country;
    }
    
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
    
    /**
     * @XmlElement countryWithNoSsnCheck
     */
    public function getCountryWithoutSsnCheck()
    {
        return $this->countryWithoutSsnCheck;
    }
    
    public function setCountryWithoutSsnCheck(CountryWithoutSsnCheckType $countryWithoutSsnCheck)
    {
        $this->countryWithoutSsnCheck = $countryWithoutSsnCheck;
        return $this;
    }
    
}
