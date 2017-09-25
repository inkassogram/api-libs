using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml.Serialization;

namespace Inkassogram.Examples.Contracts {

	[XmlRoot(ElementName = "methodCall", Namespace = "https://api.inkassogram.se/API/createInvoiceBookkeeping")]
    public class CreditInvoiceResponse {

		/// <summary>
		/// The schema location XML attribute.
		/// </summary>
		[XmlAttribute(AttributeName = "schemaLocation", Namespace = "http://www.w3.org/2001/XMLSchema-instance")]
		public string SchemaLocation = "https://api.inkassogram.se/API/createInvoiceBookkeeping https://api.inkassogram.se/API/createInvoiceBookkeepingSchema1.0.xsd";

		/// <summary>
		/// The request method name.
		/// </summary>
		[XmlElement(ElementName = "methodName")]
        public string MethodName = "creditInvoice";

        /// <summary>
        /// The response body.
        /// </summary>
        [XmlElement(ElementName = "response")]
        public CreditInvoiceResponseType Response { get; set; }

    }

    public class CreditInvoiceResponseType {
        
        [XmlElement(ElementName = "statusCode")]
        public int StatusCode { get; set; }

        [XmlElement(ElementName = "customerSsn")]
        public string CustomerSsn { get; set; }

        [XmlElement(ElementName = "companyOrgNo")]
        public string CustomerOrganizationNumber { get; set; }

        [XmlElement(ElementName = "customerName")]
        public string CustomerName { get; set; }

        [XmlElement(ElementName = "customerAddress")]
        public string CustomerAddress { get; set; }

        [XmlElement(ElementName = "customerZip")]
        public string CustomerPostalCode { get; set; }

        [XmlElement(ElementName = "customerCity")]
        public string CustomerCity { get; set; }

        [XmlElement(ElementName = "co_address1")]
        public string CoAddressLine1 { get; set; }

        [XmlElement(ElementName = "co_address2")]
        public string CoAddressLine2 { get; set; }

        [XmlElement(ElementName = "co_address3")]
        public string CoAddressLine3 { get; set; }

        [XmlElement(ElementName = "co_address4")]
        public string CoAddressLine4 { get; set; }

        [XmlElement(ElementName = "co_address5")]
        public string CoAddressLine5 { get; set; }

        [XmlElement(ElementName = "amountLeft")]
        public int AmountLeft { get; set; }

        [XmlElement(ElementName = "amountPaid")]
        public int AmountPaid { get; set; }

        [XmlElement(ElementName = "ocr")]
        public int Ocr { get; set; }

        [XmlElement(ElementName = "orderNo")]
        public string OrderNumber { get; set; }

        [XmlElement(ElementName = "bg_account")]
        public string BgAccount { get; set; }

        [XmlElement(ElementName = "dueDate")]
        public int InvoiceDueDate { get; set; }

        [XmlElement(ElementName = "invoiceFooterText")]
        public string InvoiceFooterText { get; set; }

        [XmlElement(ElementName = "pdfFile")]
        public string PdfFileUrl { get; set; }

        [XmlElement(ElementName = "errorCode")]
        public int ErrorCode { get; set; }

        [XmlElement(ElementName = "description")]
        public string ErrorDescription { get; set; }
        
    }

}
