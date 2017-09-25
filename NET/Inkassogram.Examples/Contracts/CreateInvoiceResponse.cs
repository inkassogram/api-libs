using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml.Serialization;

namespace Inkassogram.Examples.Contracts {

	[XmlRoot(ElementName = "methodCall", Namespace = "https://api.inkassogram.se/API/createInvoiceBookkeeping")]
    public class CreateInvoiceResponse {

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
        /// The response body.
        /// </summary>
        [XmlElement(ElementName = "response")]
        public CreateInvoiceResponseType Response { get; set; }

    }

    public class CreateInvoiceResponseType {

        [XmlElement(ElementName = "statusCode")]
        public int StatusCode { get; set; }

        [XmlElement(ElementName = "ocr")]
        public string Ocr { get; set; }

        [XmlElement(ElementName = "customerName")]
        public string CustomerName { get; set; }

        [XmlElement(ElementName = "customerAddress")]
        public string CustomerAddress { get; set; }

        [XmlElement(ElementName = "customerZip")]
        public string CustomerPostalCode { get; set; }

        [XmlElement(ElementName = "customerCity")]
        public string CustomerCity { get; set; }

        [XmlElement(ElementName = "pdfFile")]
        public string PdfFile { get; set; }

        [XmlElement(ElementName = "errorCode")]
        public string ErrorCode { get; set; }

        [XmlElement(ElementName = "description")]
        public string Description { get; set; }

    }

}
