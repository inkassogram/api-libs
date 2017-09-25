using System;
using System.Collections.Generic;
using System.Xml.Serialization;

namespace Inkassogram.Examples.Contracts {

    [XmlRoot(ElementName = "methodCall", Namespace = "https://api.inkassogram.se/API/createInvoiceBookkeeping")]
    public class CreateInvoiceRequest {

        /// <summary>
        /// The schema location XML attribute.
        /// </summary>
        [XmlAttribute(AttributeName = "schemaLocation", Namespace = "http://www.w3.org/2001/XMLSchema-instance")]
        public string SchemaLocation = "https://api.inkassogram.se/API/createInvoiceBookkeeping https://api.inkassogram.se/API/createInvoiceBookkeepingSchema1.0.xsd";

        /// <summary>
        /// The request method name.
        /// </summary>
        [XmlElement(ElementName = "methodName")]
        public string MethodName = "createInvoice";

        /// <summary>
        /// The request body.
        /// </summary>
        [XmlElement(ElementName = "request")]
        public CreateInvoiceRequestType Request { get; set; }

    }

    public class CreateInvoiceRequestType {

        /// <summary>
        /// If "True": the invoice won't persist any invoice. 
        /// </summary>
        [XmlElement(ElementName = "testInvoice")]
        public bool IsInTestMode { get; set; }
        
        /// <summary>
        /// If true the invoice will NOT be sent to the customer 
        /// until activation, see activate_invoice.
        /// </summary>
        [XmlElement(ElementName = "makeInvoiceReservation")]
        public int MakeInvoiceReservation { get; set; }
        
        /// <summary>
        /// Force to send invoice even though the end user has got a bad credit rate. 
        /// Suitable for use with errorCode 116, 117 120 and 121.
        /// </summary>
        [XmlElement(ElementName = "forceToSend")]
        public int ForceToSend { get; set; }

        /// <summary>
        /// Fakturaservice
        /// Fakturabelåning
        /// Factoring
        /// </summary>
        [XmlElement(ElementName = "service")]
        public ServiceType Service { get; set; }

        /// <summary>
        /// E-faktura, PDF
        /// Printa själv
        /// Print on Demand
        /// SMS Faktura
        /// </summary>
        [XmlElement(ElementName = "printSetup")]
        public PrintSetupType PrintSetup { get; set; }

        /// <summary>
        /// Social Security Number, Organization Number, or a 32 character auth key (ONLY for WAP Purchase API).
        /// </summary>
        [XmlElement(ElementName = "ssn", IsNullable = false)]
        public string SSN { get; set; }

        /// <summary>
        /// ?
        /// </summary>
        [XmlElement(ElementName = "send_to_organization", IsNullable = true)]
        public int? SendToOrganization { get; set; }

        /// <summary>
        /// Used to send invoices to other countries.
        /// </summary>
        [XmlElement(ElementName = "foreignCustomer")]
        public ForeignCustomerType ForeignCustomer { get; set; }
        
        /// <summary>
        /// To send the invoice to another address instead of the company address
        /// </summary>
        [XmlElement(ElementName = "careOfAddress")]
        public CareOfAddressType CareOfAddress { get; set; }

        /// <summary>
        /// This value will be visible on the invoice as an order number.
        /// </summary>
        [XmlElement(ElementName = "invoiceRef")]
        public string InvoiceReference { get; set; }

        /// <summary>
        /// The reference number of the order made from the end customer. 
        /// Will be visible on the invoice for the end customer
        /// </summary>
        [XmlElement(ElementName = "invoiceOrderNo")]
        public string InvoiceOrderNo { get; set; }

        /// <summary>
        /// Shipping fee for an order. This value will be added as an invoice row
        /// </summary>
        [XmlElement(ElementName = "shippingFee", IsNullable = true)]
        public int? ShippingFee { get; set; }

        /// <summary>
        /// Expedition fee. This value will be added as an invoice row
        /// </summary>
        [XmlElement(ElementName = "expFee", IsNullable = true)]
        public int? ExpeditionFee { get; set; }

        /// <summary>
        /// Date when the invoice shall be sent to the receiver.
        /// </summary>
        [XmlElement(ElementName = "invoiceDate", IsNullable = true)]
        public int? InvoiceDate { get; set; }

        /// <summary>
        /// Invoice Due Date in Unixtime format.
        /// </summary>
        [XmlElement(ElementName = "dueDate", IsNullable = true)]
        public int? InvoiceDueDate { get; set; }

        /// <summary>
        /// ?
        /// </summary>
        [XmlElement(ElementName = "clientIp")]
        public string ClientIpAddress { get; set; }

        /// <summary>
        /// URL for callback trigger when invoice has been changed or a payment is received.
        /// </summary>
        [XmlElement(ElementName = "callback")]
        public string CallbackUrl { get; set; }

        /// <summary>
        /// Mobile Phone Number
        /// </summary>
        [XmlElement(ElementName = "mobile")]
        public string Mobile { get; set; }

        /// <summary>
        /// Email Address.
        /// </summary>
        [XmlElement(ElementName = "email")]
        public string EmailAddress { get; set; }

        /// <summary>
        /// Order Number, must be unique for each invoice and should be an internal value. 
        /// Used to get the status or credit the invoice.
        /// </summary>
        [XmlElement(ElementName = "orderNo", IsNullable = false)]
        public string OrderNo { get; set; }

        /// <summary>
        /// Visible as Our Reference.
        /// </summary>
        [XmlElement(ElementName = "ourRef")]
        public string OurRef { get; set; }

        /// <summary>
        /// Visible as Your Reference.
        /// </summary>
        [XmlElement(ElementName = "yourRef")]
        public string YourRef { get; set; }

        [XmlArray("invoiceRows")]
        [XmlArrayItem("row")]
        public InvoiceRowsType InvoiceRows { get; set; }

        /// <summary>
        /// Add an invoice Comment for the end user. Visible below the article rows on the invoice.
        /// </summary>
        [XmlElement(ElementName = "comments")]
        public string Comment { get; set; }

        /// <summary>
        /// Discount percentage of the total invoice amount.
        /// </summary>
        [XmlElement(ElementName = "discount", IsNullable = true)]
        public int? Discount { get; set; }

        /// <summary>
        /// ?
        /// </summary>
        [XmlElement(ElementName = "billingVar")]
        public string BillingVar { get; set; }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeSendToOrganization() {
            return SendToOrganization != null;
        }
        
        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeShippingFee() {
            return ShippingFee != null;
        }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeExpeditionFee() {
            return ExpeditionFee != null;
        }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeInvoiceDate() {
            return InvoiceDate != null;
        }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeInvoiceDueDate() {
            return InvoiceDueDate != null;
        }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeDiscount() {
            return Discount != null;
        }

    }

    public class ForeignCustomerType {

        /// <summary>
        /// Sweden/Norway/Denmark/Finland - Countries which are supported with "ssn_check".
        /// </summary>
        [XmlElement(ElementName = "country")]
        public string Country { get; set; }

        /// <summary>
        /// Special agreement is needed in order to use this option.
        /// </summary>
        [XmlElement(ElementName = "countryWithNoSsnCheck")]
        public CountryWithoutSsnCheckType CountryWithoutSsnCheck { get; set; }

    }

    public class CountryWithoutSsnCheckType {

        /// <summary>
        /// SE = Sverige, NO = Norway etc.
        /// </summary>
        [XmlElement(ElementName = "countryCode", IsNullable = false)]
        public string CountryCode { get; set; }

        /// <summary>
        /// Must be used with the correct address if countryWithNoSsnCheck is used. To change 
        /// address if country is used you have to define the careOfAddress instead. 
        /// These elements will be ignored if just country is used.
        /// </summary>
        [XmlElement(ElementName = "addressLine1", IsNullable = false)]
        public string AddressLine1 { get; set; }

        /// <summary>
        /// Must be used with the correct address if countryWithNoSsnCheck is used.
        /// </summary>
        [XmlElement(ElementName = "addressLine2", IsNullable = false)]
        public string AddressLine2 { get; set; }

        /// <summary>
        /// Optional extra address line.
        /// </summary>
        [XmlElement(ElementName = "addressLine3")]
        public string AddressLine3 { get; set; }

        /// <summary>
        /// Optional extra address line.
        /// </summary>
        [XmlElement(ElementName = "addressLine4")]
        public string AddressLine4 { get; set; }

    }

    public class CareOfAddressType {

        /// <summary>
        /// The <see cref="CareOfType"/>.
        /// </summary>
        [XmlElement(ElementName = "careOf")]
        public CareOfType CareOf { get; set; }

    }

    public class CareOfType {

        /// <summary>
        /// Company Name / Invoice Receiver Name
        /// </summary>
        [XmlElement(ElementName = "co_name", IsNullable = false)]
        public string Name { get; set; }

        /// <summary>
        /// Address line.
        /// </summary>
        [XmlElement(ElementName = "co_address", IsNullable = false)]
        public string AddressLine1 { get; set; }

        /// <summary>
        /// Optional extra address line.
        /// </summary>
        [XmlElement(ElementName = "co_address2")]
        public string AddressLine2 { get; set; }

        /// <summary>
        /// Optional postal code.
        /// </summary>
        [XmlElement(ElementName = "co_zip")]
        public string PostalCode { get; set; }

        /// <summary>
        /// Optional city / town.
        /// </summary>
        [XmlElement(ElementName = "co_city")]
        public string City { get; set; }

    }

    public class InvoiceRowsType : List<InvoiceRowType> { }

    public class InvoiceRowType {

        /// <summary>
        /// Article Number.
        /// </summary>
        [XmlElement(ElementName = "articleNo")]
        public string ArticleNo { get; set; }

        /// <summary>
        /// Article Text, such as Ticket, Member fee. Max length 120 characters
        /// </summary>
        [XmlElement(ElementName = "text")]
        public string ArticleText { get; set; }

        /// <summary>
        /// Description of the article. Max length 120 characters
        /// </summary>
        [XmlElement(ElementName = "desc")]
        public string Description { get; set; }

        /// <summary>
        /// Vat of the article.
        /// </summary>
        [XmlElement(ElementName = "vat", IsNullable = true)]
        public int? Vat { get; set; }

        /// <summary>
        /// The quantity of the sold articles.
        /// </summary>
        [XmlElement(ElementName = "quantity", IsNullable = true)]
        public int? Quantity { get; set; }

        /// <summary>
        /// Price inc. VAT in Á price
        /// </summary>
        [XmlElement(ElementName = "price")]
        public int Price { get; set; }

        /// <summary>
        /// Price inc. VAT in Á price
        /// </summary>
        [XmlElement(ElementName = "discount", IsNullable = true)]
        public int? Discount { get; set; }

        /// <summary>
        /// Column Unit will be added to the article rows/invoice rows.
        /// </summary>
        [XmlElement(ElementName = "unit")]
        public string Unit { get; set; }

        /// <summary>
        /// Bookkeeping account for the bookkeeping
        /// </summary>
        [XmlElement(ElementName = "bookkeepingAccount", IsNullable = true)]
        public int? BookkeepingAccount { get; set; }

        /// <summary>
        /// Used in the bookkeeping.
        /// </summary>
        [XmlElement(ElementName = "profitUnit")]
        public string ProfitUnit { get; set; }

        /// <summary>
        /// Used in the bookkeeping.
        /// </summary>
        [XmlElement(ElementName = "project")]
        public string Project { get; set; }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeVat() {
            return Vat != null;
        }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeQuantity() {
            return Quantity != null;
        }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeDiscount() {
            return Discount != null;
        }

        /// <summary>
        /// Serialize nullable values helper
        /// </summary>
        public bool ShouldSerializeBookkeepingAccount() {
            return BookkeepingAccount != null;
        }

    }

}
