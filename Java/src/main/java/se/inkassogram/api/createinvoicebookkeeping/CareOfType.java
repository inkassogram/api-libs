//
// This file was generated by the JavaTM Architecture for XML Binding(JAXB) Reference Implementation, vhudson-jaxb-ri-2.1-2 
// See <a href="http://java.sun.com/xml/jaxb">http://java.sun.com/xml/jaxb</a> 
// Any modifications to this file will be lost upon recompilation of the source schema. 
// Generated on: 2017.10.12 at 09:28:51 AM CEST 
//


package se.inkassogram.api.createinvoicebookkeeping;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Java class for careOfType complex type.
 * 
 * <p>The following schema fragment specifies the expected content contained within this class.
 * 
 * <pre>
 * &lt;complexType name="careOfType">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="co_name" type="{http://www.w3.org/2001/XMLSchema}string"/>
 *         &lt;element name="co_address" type="{http://www.w3.org/2001/XMLSchema}string"/>
 *         &lt;element name="co_address2" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="co_zip" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="co_city" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "careOfType", propOrder = {
    "coName",
    "coAddress",
    "coAddress2",
    "coZip",
    "coCity"
})
public class CareOfType {

    @XmlElement(name = "co_name", required = true)
    protected String coName;
    @XmlElement(name = "co_address", required = true)
    protected String coAddress;
    @XmlElement(name = "co_address2")
    protected String coAddress2;
    @XmlElement(name = "co_zip")
    protected String coZip;
    @XmlElement(name = "co_city")
    protected String coCity;

    /**
     * Gets the value of the coName property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getCoName() {
        return coName;
    }

    /**
     * Sets the value of the coName property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setCoName(String value) {
        this.coName = value;
    }

    /**
     * Gets the value of the coAddress property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getCoAddress() {
        return coAddress;
    }

    /**
     * Sets the value of the coAddress property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setCoAddress(String value) {
        this.coAddress = value;
    }

    /**
     * Gets the value of the coAddress2 property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getCoAddress2() {
        return coAddress2;
    }

    /**
     * Sets the value of the coAddress2 property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setCoAddress2(String value) {
        this.coAddress2 = value;
    }

    /**
     * Gets the value of the coZip property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getCoZip() {
        return coZip;
    }

    /**
     * Sets the value of the coZip property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setCoZip(String value) {
        this.coZip = value;
    }

    /**
     * Gets the value of the coCity property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getCoCity() {
        return coCity;
    }

    /**
     * Sets the value of the coCity property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setCoCity(String value) {
        this.coCity = value;
    }

}
