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
 * Class equivalent to the XML element InvoiceRowType.
 * <row ...></row>
 *
 * @package Inkassogram
 * @author  Johan Sall Larsson <johan@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   1.0.0
 *
 * @XmlElement row
 */
class InvoiceRowType
{

    /**
     * Article Number.
     * @var string
     */
    private $articleNumber;
    
    /**
     * Article Text, such as Ticket, Member fee. Max length 120 characters
     * @var string
     */
    private $articleText;

    /**
     * Description of the article. Max length 120 characters
     * @var string
     */
    private $description;
    
    /**
     * Vat of the article.
     * @var int
     */
    private $vat;
    
    /**
     * The quantity of the sold articles.
     * @var int
     */
    private $quantity;
    
    /**
     * Price inc. VAT in Á price.
     * @var int
     */
    private $price;
    
    /**
     * Price inc. VAT in Á price.
     * @var int
     */
    private $discount;
    
    /**
     * Column Unit will be added to the article rows/invoice rows.
     * @var string
     */
    private $unit;
    
    /**
     * Bookkeeping account for the bookkeeping
     * @var int
     */
    private $bookkeepingAccount;
    
    /**
     * Used in the bookkeeping.
     * @var string
     */
    private $profitUnit;
    
    /**
     * Used in the bookkeeping.
     * @var string
     */
    private $project;
    
    /********************************************************************************
     * Getters and setters
     *******************************************************************************/
     
    /**
     * @XmlElement articleNo
     */
    public function getArticleNumber()
    {
        return $this->articleNumber;
    }
    
    public function setArticleNumber($articleNumber)
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }
    
    /**
     * @XmlElement text
     */
    public function getArticleText()
    {
        return $this->articleText;
    }
    
    public function setArticleText($articleText)
    {
        $this->articleText = $articleText;
        return $this;
    }
    
    /**
     * @XmlElement desc
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    
    /**
     * @XmlElement vat
     */
    public function getVat()
    {
        return $this->vat;
    }
    
    public function setVat($vat)
    {
        $this->vat = $vat;
        return $this;
    }
    
    /**
     * @XmlElement quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
    
    /**
     * @XmlElement price
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    public function setPrice($price)
    {
        $this->price = $price;
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
     * @XmlElement unit
     */
    public function getUnit()
    {
        return $this->unit;
    }
    
    public function setUnit($unit)
    {
        $this->unit = $unit;
        return $this;
    }
    
    /**
     * @XmlElement bookkeepingAccount
     */
    public function getBookkeepingAccount()
    {
        return $this->bookkeepingAccount;
    }
    
    public function setBookkeepingAccount($bookkeepingAccount)
    {
        $this->bookkeepingAccount = $bookkeepingAccount;
        return $this;
    }
    
    /**
     * @XmlElement profitUnit
     */
    public function getProfitUnit()
    {
        return $this->profitUnit;
    }
    
    public function setProfitUnit($profitUnit)
    {
        $this->profitUnit = $profitUnit;
        return $this;
    }
    
    /**
     * @XmlElement project
     */
    public function getProject()
    {
        return $this->project;
    }
    
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }
    
}
