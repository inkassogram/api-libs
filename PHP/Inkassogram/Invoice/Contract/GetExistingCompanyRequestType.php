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
 * Class equivalent to XSD element GetExistingCompanyRequestType.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class GetExistingCompanyRequestType extends AuthenticationType 
{
    /**
     * Organization number.
     * @var string
     */
    private $company_organization_number;
    
    /**
     * ?
     * @var bool
     */
    private $reseller_key;
    

    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
    
    public function getCompany_organization_number()
    {
        return $this->company_organization_number;
    }
    
    public function setCompany_organization_number($company_organization_number)
    {
        $this->company_organization_number = $company_organization_number;
    }

    public function getReseller_key()
    {
        return $this->reseller_key;
    }
    
    public function setReseller_key($reseller_key)
    {
        $this->reseller_key = $reseller_key;
    }
}
