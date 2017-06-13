<?php
/**
 * Inkassogram Bookkeeping API Client
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
 
namespace Inkassogram\Bookkeeping\Serializer; 

/**
 * Simple class to XML serializer.
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class XmlSerializer
{
    
    /********************************************************************************
     * Public Functions
     *******************************************************************************/
     
    /**
     * Serializes a class to XML.
     * @param    object           $class
     * @return   SimpleXMLElement
     */
    public function serialize($class)
    {
        return $this->serializeClass($class);
    }
    
    /********************************************************************************
     * Private Functions
     *******************************************************************************/
     
    /**
     * Adds XML attributes to the XML root (the class)
     * @param    object           $class
     * @return   SimpleXMLElement
     */
    private function serializeClass($class)
    {
        $reflector = new \ReflectionClass(get_class($class));
        $attributes = $this->getXmlAttributes($reflector->getDocComment());
        if (count($attributes) == 0) {
            throw new Exception('No attributes found!');
        }
        $rootXml = new \SimpleXMLElement(sprintf('<?xml version="1.0" encoding="UTF-8"?><%s/>', trim($attributes['@XmlElement'])));
        if (isset($attributes['@XmlNamespace'])) {
            $rootXml->addAttribute('xmlns', trim($attributes['@XmlNamespace']));
        }
        if (isset($attributes['@XmlSchemaLocation'])) {
            $rootXml->addAttribute('xmlns:xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
            $rootXml->addAttribute('xsi:xsi:schemaLocation', trim($attributes['@XmlSchemaLocation']));
        }
        $this->traverse($class, $rootXml);
        return $rootXml;
    }

    /**
     * Traverse through methods and array objects.
     * @param    mixed            $objOrArr
     * @param    SimpleXMLElement $xmlNode
     * @return   SimpleXMLElement
     */
    private function traverse($objOrArr, \SimpleXMLElement $xmlNode)
    {  
        $items = $objOrArr;
        if (is_object($objOrArr)) {
            $items = get_class_methods($objOrArr);
            $reflector = new \ReflectionClass(get_class($objOrArr));
        }
        foreach($items as $item) {
            if (is_object($item)) {
                $reflector = new \ReflectionClass(get_class($item));
                $attr = $this->getXmlAttributes($reflector->getDocComment());
                if (isset($attr['@XmlElement'])) {
                    $key = trim($attr['@XmlElement']);
                    $this->traverse($item, $xmlNode->addChild($key));
                }
            } else if (strncmp($item, 'set', 3)) {
                $value = $objOrArr->$item();
                if ($value !== null) {
                    $attr = $this->getXmlAttributes($reflector->getMethod($item)->getDocComment());
                    if (isset($attr['@XmlElement'])) {
                        $key = trim($attr['@XmlElement']);
                        if (is_object($value) || is_array($value)) {
                            $this->traverse($value, $xmlNode->addChild($key));
                        } else {
                            $xmlNode->addChild($key, $value);
                        }
                    }
                }
            }
        }
    }
    
    /**
     * Extracts XML attributes in a doc block string.
     * @param     string           $docBlock
     * @return    SimpleXMLElement
     */
    private function getXmlAttributes($docBlock)
    {
        $retval = array();
        if (preg_match_all('/@Xml(\w+)\s+(.*)\r?\n/m', $docBlock, $matches)) {
            for ($i = 0; $i < count($matches[1]); $i++) {
                $retval['@Xml'.$matches[1][$i]] = $matches[2][$i];
            }
        }
        return $retval;
    }
    
}
