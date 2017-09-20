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
 
namespace Includes\Inkassogram\Invoice\Contract; 

/**
 * SOAP request base class.
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class SoapRequest
{

    /**
     * A request object. Must be set public
     * in order for soapClient to serialize.
     * @var object
     */
    public $request;
    
    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
     
    /**
     * Returns the request.
     * @returns object
     */
    public function getRequest()
    {
        return $this->request;
    }
    
    /**
     * Sets the request.
     * @param object $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }
    
}
