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
 * <p>Java class for requestType complex type.
 * 
 * <p>The following schema fragment specifies the expected content contained within this class.
 * 
 * <pre>
 * &lt;complexType name="requestType">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="testInvoice" minOccurs="0">
 *           &lt;simpleType>
 *             &lt;restriction base="{http://www.w3.org/2001/XMLSchema}string">
 *               &lt;enumeration value="true"/>
 *             &lt;/restriction>
 *           &lt;/simpleType>
 *         &lt;/element>
 *         &lt;element name="makeInvoiceReservation" minOccurs="0">
 *           &lt;simpleType>
 *             &lt;restriction base="{http://www.w3.org/2001/XMLSchema}int">
 *               &lt;enumeration value="1"/>
 *               &lt;enumeration value="0"/>
 *             &lt;/restriction>
 *           &lt;/simpleType>
 *         &lt;/element>
 *         &lt;element name="forceToSend" minOccurs="0">
 *           &lt;simpleType>
 *             &lt;restriction base="{http://www.w3.org/2001/XMLSchema}int">
 *               &lt;enumeration value="1"/>
 *               &lt;enumeration value="0"/>
 *             &lt;/restriction>
 *           &lt;/simpleType>
 *         &lt;/element>
 *         &lt;element name="service">
 *           &lt;simpleType>
 *             &lt;restriction base="{http://www.w3.org/2001/XMLSchema}int">
 *               &lt;enumeration value="3"/>
 *               &lt;enumeration value="2"/>
 *               &lt;enumeration value="1"/>
 *             &lt;/restriction>
 *           &lt;/simpleType>
 *         &lt;/element>
 *         &lt;element name="printSetup">
 *           &lt;simpleType>
 *             &lt;restriction base="{http://www.w3.org/2001/XMLSchema}int">
 *               &lt;enumeration value="4"/>
 *               &lt;enumeration value="3"/>
 *               &lt;enumeration value="2"/>
 *               &lt;enumeration value="1"/>
 *             &lt;/restriction>
 *           &lt;/simpleType>
 *         &lt;/element>
 *         &lt;element name="ssn" type="{http://www.w3.org/2001/XMLSchema}string"/>
 *         &lt;element name="bankid_order_ref" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="send_to_organization" type="{http://www.w3.org/2001/XMLSchema}int" minOccurs="0"/>
 *         &lt;element name="foreignCustomer" type="{http://www.inkassogram.se/API/createInvoiceBookkeeping}foreignCustomerType" minOccurs="0"/>
 *         &lt;element name="careOfAddress" type="{http://www.inkassogram.se/API/createInvoiceBookkeeping}careOfAddressType" minOccurs="0"/>
 *         &lt;element name="invoiceRef" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="invoiceOrderNo" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="shippingFee" type="{http://www.w3.org/2001/XMLSchema}int" minOccurs="0"/>
 *         &lt;element name="expFee" type="{http://www.w3.org/2001/XMLSchema}int" minOccurs="0"/>
 *         &lt;element name="invoiceDate" type="{http://www.w3.org/2001/XMLSchema}int" minOccurs="0"/>
 *         &lt;element name="dueDate" type="{http://www.w3.org/2001/XMLSchema}int" minOccurs="0"/>
 *         &lt;element name="clientIp" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="callback" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="mobile" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="email" type="{http://www.w3.org/2001/XMLSchema}string"/>
 *         &lt;element name="orderNo" type="{http://www.w3.org/2001/XMLSchema}string"/>
 *         &lt;element name="ourRef" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="yourRef" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="invoiceRows" type="{http://www.inkassogram.se/API/createInvoiceBookkeeping}invoiceRowsType"/>
 *         &lt;element name="comments" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="discount" type="{http://www.w3.org/2001/XMLSchema}int" minOccurs="0"/>
 *         &lt;element name="billingVar" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "requestType", propOrder = {
    "testInvoice",
    "makeInvoiceReservation",
    "forceToSend",
    "service",
    "printSetup",
    "ssn",
    "bankidOrderRef",
    "sendToOrganization",
    "foreignCustomer",
    "careOfAddress",
    "invoiceRef",
    "invoiceOrderNo",
    "shippingFee",
    "expFee",
    "invoiceDate",
    "dueDate",
    "clientIp",
    "callback",
    "mobile",
    "email",
    "orderNo",
    "ourRef",
    "yourRef",
    "invoiceRows",
    "comments",
    "discount",
    "billingVar"
})
public class RequestType {

    protected String testInvoice;
    protected Integer makeInvoiceReservation;
    protected Integer forceToSend;
    protected int service;
    protected int printSetup;
    @XmlElement(required = true)
    protected String ssn;
    @XmlElement(name = "bankid_order_ref")
    protected String bankidOrderRef;
    @XmlElement(name = "send_to_organization")
    protected Integer sendToOrganization;
    protected ForeignCustomerType foreignCustomer;
    protected CareOfAddressType careOfAddress;
    protected String invoiceRef;
    protected String invoiceOrderNo;
    protected Integer shippingFee;
    protected Integer expFee;
    protected Integer invoiceDate;
    protected Integer dueDate;
    protected String clientIp;
    protected String callback;
    protected String mobile;
    @XmlElement(required = true)
    protected String email;
    @XmlElement(required = true)
    protected String orderNo;
    protected String ourRef;
    protected String yourRef;
    @XmlElement(required = true)
    protected InvoiceRowsType invoiceRows;
    protected String comments;
    protected Integer discount;
    protected String billingVar;

    /**
     * Gets the value of the testInvoice property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getTestInvoice() {
        return testInvoice;
    }

    /**
     * Sets the value of the testInvoice property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setTestInvoice(String value) {
        this.testInvoice = value;
    }

    /**
     * Gets the value of the makeInvoiceReservation property.
     * 
     * @return
     *     possible object is
     *     {@link Integer }
     *     
     */
    public Integer getMakeInvoiceReservation() {
        return makeInvoiceReservation;
    }

    /**
     * Sets the value of the makeInvoiceReservation property.
     * 
     * @param value
     *     allowed object is
     *     {@link Integer }
     *     
     */
    public void setMakeInvoiceReservation(Integer value) {
        this.makeInvoiceReservation = value;
    }

    /**
     * Gets the value of the forceToSend property.
     * 
     * @return
     *     possible object is
     *     {@link Integer }
     *     
     */
    public Integer getForceToSend() {
        return forceToSend;
    }

    /**
     * Sets the value of the forceToSend property.
     * 
     * @param value
     *     allowed object is
     *     {@link Integer }
     *     
     */
    public void setForceToSend(Integer value) {
        this.forceToSend = value;
    }

    /**
     * Gets the value of the service property.
     * 
     */
    public int getService() {
        return service;
    }

    /**
     * Sets the value of the service property.
     * 
     */
    public void setService(int value) {
        this.service = value;
    }

    /**
     * Gets the value of the printSetup property.
     * 
     */
    public int getPrintSetup() {
        return printSetup;
    }

    /**
     * Sets the value of the printSetup property.
     * 
     */
    public void setPrintSetup(int value) {
        this.printSetup = value;
    }

    /**
     * Gets the value of the ssn property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getSsn() {
        return ssn;
    }

    /**
     * Sets the value of the ssn property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setSsn(String value) {
        this.ssn = value;
    }

    /**
     * Gets the value of the bankidOrderRef property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getBankidOrderRef() {
        return bankidOrderRef;
    }

    /**
     * Sets the value of the bankidOrderRef property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setBankidOrderRef(String value) {
        this.bankidOrderRef = value;
    }

    /**
     * Gets the value of the sendToOrganization property.
     * 
     * @return
     *     possible object is
     *     {@link Integer }
     *     
     */
    public Integer getSendToOrganization() {
        return sendToOrganization;
    }

    /**
     * Sets the value of the sendToOrganization property.
     * 
     * @param value
     *     allowed object is
     *     {@link Integer }
     *     
     */
    public void setSendToOrganization(Integer value) {
        this.sendToOrganization = value;
    }

    /**
     * Gets the value of the foreignCustomer property.
     * 
     * @return
     *     possible object is
     *     {@link ForeignCustomerType }
     *     
     */
    public ForeignCustomerType getForeignCustomer() {
        return foreignCustomer;
    }

    /**
     * Sets the value of the foreignCustomer property.
     * 
     * @param value
     *     allowed object is
     *     {@link ForeignCustomerType }
     *     
     */
    public void setForeignCustomer(ForeignCustomerType value) {
        this.foreignCustomer = value;
    }

    /**
     * Gets the value of the careOfAddress property.
     * 
     * @return
     *     possible object is
     *     {@link CareOfAddressType }
     *     
     */
    public CareOfAddressType getCareOfAddress() {
        return careOfAddress;
    }

    /**
     * Sets the value of the careOfAddress property.
     * 
     * @param value
     *     allowed object is
     *     {@link CareOfAddressType }
     *     
     */
    public void setCareOfAddress(CareOfAddressType value) {
        this.careOfAddress = value;
    }

    /**
     * Gets the value of the invoiceRef property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getInvoiceRef() {
        return invoiceRef;
    }

    /**
     * Sets the value of the invoiceRef property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setInvoiceRef(String value) {
        this.invoiceRef = value;
    }

    /**
     * Gets the value of the invoiceOrderNo property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getInvoiceOrderNo() {
        return invoiceOrderNo;
    }

    /**
     * Sets the value of the invoiceOrderNo property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setInvoiceOrderNo(String value) {
        this.invoiceOrderNo = value;
    }

    /**
     * Gets the value of the shippingFee property.
     * 
     * @return
     *     possible object is
     *     {@link Integer }
     *     
     */
    public Integer getShippingFee() {
        return shippingFee;
    }

    /**
     * Sets the value of the shippingFee property.
     * 
     * @param value
     *     allowed object is
     *     {@link Integer }
     *     
     */
    public void setShippingFee(Integer value) {
        this.shippingFee = value;
    }

    /**
     * Gets the value of the expFee property.
     * 
     * @return
     *     possible object is
     *     {@link Integer }
     *     
     */
    public Integer getExpFee() {
        return expFee;
    }

    /**
     * Sets the value of the expFee property.
     * 
     * @param value
     *     allowed object is
     *     {@link Integer }
     *     
     */
    public void setExpFee(Integer value) {
        this.expFee = value;
    }

    /**
     * Gets the value of the invoiceDate property.
     * 
     * @return
     *     possible object is
     *     {@link Integer }
     *     
     */
    public Integer getInvoiceDate() {
        return invoiceDate;
    }

    /**
     * Sets the value of the invoiceDate property.
     * 
     * @param value
     *     allowed object is
     *     {@link Integer }
     *     
     */
    public void setInvoiceDate(Integer value) {
        this.invoiceDate = value;
    }

    /**
     * Gets the value of the dueDate property.
     * 
     * @return
     *     possible object is
     *     {@link Integer }
     *     
     */
    public Integer getDueDate() {
        return dueDate;
    }

    /**
     * Sets the value of the dueDate property.
     * 
     * @param value
     *     allowed object is
     *     {@link Integer }
     *     
     */
    public void setDueDate(Integer value) {
        this.dueDate = value;
    }

    /**
     * Gets the value of the clientIp property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getClientIp() {
        return clientIp;
    }

    /**
     * Sets the value of the clientIp property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setClientIp(String value) {
        this.clientIp = value;
    }

    /**
     * Gets the value of the callback property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getCallback() {
        return callback;
    }

    /**
     * Sets the value of the callback property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setCallback(String value) {
        this.callback = value;
    }

    /**
     * Gets the value of the mobile property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getMobile() {
        return mobile;
    }

    /**
     * Sets the value of the mobile property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setMobile(String value) {
        this.mobile = value;
    }

    /**
     * Gets the value of the email property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getEmail() {
        return email;
    }

    /**
     * Sets the value of the email property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setEmail(String value) {
        this.email = value;
    }

    /**
     * Gets the value of the orderNo property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getOrderNo() {
        return orderNo;
    }

    /**
     * Sets the value of the orderNo property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setOrderNo(String value) {
        this.orderNo = value;
    }

    /**
     * Gets the value of the ourRef property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getOurRef() {
        return ourRef;
    }

    /**
     * Sets the value of the ourRef property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setOurRef(String value) {
        this.ourRef = value;
    }

    /**
     * Gets the value of the yourRef property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getYourRef() {
        return yourRef;
    }

    /**
     * Sets the value of the yourRef property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setYourRef(String value) {
        this.yourRef = value;
    }

    /**
     * Gets the value of the invoiceRows property.
     * 
     * @return
     *     possible object is
     *     {@link InvoiceRowsType }
     *     
     */
    public InvoiceRowsType getInvoiceRows() {
        return invoiceRows;
    }

    /**
     * Sets the value of the invoiceRows property.
     * 
     * @param value
     *     allowed object is
     *     {@link InvoiceRowsType }
     *     
     */
    public void setInvoiceRows(InvoiceRowsType value) {
        this.invoiceRows = value;
    }

    /**
     * Gets the value of the comments property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getComments() {
        return comments;
    }

    /**
     * Sets the value of the comments property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setComments(String value) {
        this.comments = value;
    }

    /**
     * Gets the value of the discount property.
     * 
     * @return
     *     possible object is
     *     {@link Integer }
     *     
     */
    public Integer getDiscount() {
        return discount;
    }

    /**
     * Sets the value of the discount property.
     * 
     * @param value
     *     allowed object is
     *     {@link Integer }
     *     
     */
    public void setDiscount(Integer value) {
        this.discount = value;
    }

    /**
     * Gets the value of the billingVar property.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getBillingVar() {
        return billingVar;
    }

    /**
     * Sets the value of the billingVar property.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setBillingVar(String value) {
        this.billingVar = value;
    }

}
