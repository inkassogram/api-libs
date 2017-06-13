<?php
/**
 * Inkassogram Bookkeeping API Client
 *
 * @author      Johan Sall Larsson <johan@inkassogram.se>
 * @author      Simon Stal <simon@inkassogram.se>
 * @copyright   2017 Inkassogram AB (publ)
 * @version     1.0.0
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
 * Class equivalent to the XML element CountryWithoutSsnCheckType.
 * <countryWithoutSsnCheck ...></countryWithoutSsnCheck>
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   1.0.0
 */
class CountryWithoutSsnCheckType
{

    /**
     * An ISO 3166-1 alpha-2 two-letter country code, e.g. SE (Sweden), NO (Norway).
     * @var string
     */
    private $countryCode;

    /**
     * Must be used with the correct address if countryWithNoSsnCheck is used. To change 
     * address if country is used you have to define the careOfAddress instead. 
     * These elements will be ignored if just country is used.
     * @var string
     */
    private $addressLine1;

    /**
     * Must be used with the correct address if countryWithNoSsnCheck is used.
     * @var string
     */
    private $addressLine2;

    /**
     * Optional extra address line.
     * @var string
     */
    private $addressLine3;

    /**
     * Optional extra address line.
     * @var string
     */
    private $addressLine4;

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
     
    /**
     * @XmlElement countryCode
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }
    
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }
    
    /**
     * @XmlElement addressLine1
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }
    
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }
    
    /**
     * @XmlElement addressLine2
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }
    
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }
    
    /**
     * @XmlElement addressLine3
     */
    public function getAddressLine3()
    {
        return $this->addressLine3;
    }
    
    public function setAddressLine3($addressLine3)
    {
        $this->addressLine3 = $addressLine3;
        return $this;
    }
    
    /**
     * @XmlElement addressLine4
     */
    public function getAddressLine4()
    {
        return $this->addressLine4;
    }
    
    public function setAddressLine4($addressLine4)
    {
        $this->addressLine4 = $addressLine4;
        return $this;
    }
    
}
