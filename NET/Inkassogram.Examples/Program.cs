using Inkassogram.Examples.Contracts;
using Inkassogram.Examples.Utils.Ext;
using Inkassogram.Examples.Utils;
using System;
using System.Configuration;

namespace Inkassogram.Examples {

    /// <summary>
    /// Bookkeeping API example.
    /// </summary>
    internal class Program {

        /// <summary>
        /// The Bookkeeping API client.
        /// </summary>
        static BookkeepingClient Client { get; set; }

        /// <summary>
        /// Main method.
        /// </summary>
        /// <param name="args"></param>
        static void Main(string[] args) {

            try {
                Initialize();
                string line;
                Console.WriteLine("Choose operation to invoke:\n");
                Console.WriteLine("1. Create invoice\n");
                Console.WriteLine("2. Credit invoice\n");
                do {
                    line = Console.ReadLine();
                    if (line.IsNotNull()) {
                        switch (line) {
                            case "1":
                                OutPutResponse(CreateInvoice());
                                break;
                            case "2":
                                OutPutResponse(CreditInvoice());
                                break;
                            case "q":
                            case "quit":
                            case "exit":
                                return;
                            default:
                                Console.WriteLine("\nPlease choose an operation from 1-2.");
                                break;
                        }
                    }
                } while (line.IsNotNull());
            } catch (Exception ex) {
                Console.WriteLine("\nAn exception occured, press CTRL+Z to exit or enter 'q', 'quit' or 'exit'.\n\nException: {0} {1}", ex.Message, ex.InnerException);
                Console.ReadLine();
            }
        }

        /// <summary>
        /// Create an invoice example.
        /// </summary>
        static CreateInvoiceResponseType CreateInvoice() {
            string orgOrSsn = "";
            string emailAddress = "";
            orgOrSsn.ThrowIfNull("Organizational number or social security number must be set!");
            emailAddress.ThrowIfNull("E-mail address must be set!");
            var request = new CreateInvoiceRequest() {
                Request = new CreateInvoiceRequestType() {
                    IsInTestMode = true,
                    MakeInvoiceReservation = 1,
                    ForceToSend = 0,
                    Service = ServiceType.InvoiceService,
                    PrintSetup = PrintSetupType.EPdfPrint,
                    SSN = orgOrSsn,
                    EmailAddress = emailAddress,
                    OrderNo = Guid.NewGuid().ToString(),
                    InvoiceDate = DateTimeUtils.UnixTime(DateTime.UtcNow),
                    InvoiceDueDate = DateTimeUtils.UnixTime(DateTime.UtcNow.AddDays(30)),
                    InvoiceRows = new InvoiceRowsType() {
                        new InvoiceRowType() {
                            ArticleText = "Biljett",
                            ArticleNo = "666",
                            Description = "GOT - STO 2099-01-01",
                            Quantity = 1,
                            Vat = 0,
                            Price = 100,
                            Unit = "pcs",
                            BookkeepingAccount = 9999
                        }
                    }
                }
            };
            Console.WriteLine("XML request: ");
            Console.WriteLine(XmlUtils.Serialize<CreateInvoiceRequest>(request));
            return Client.CreateInvoice(request).Response;
        }

        /// <summary>
        /// Credit an invoice row example.
        /// </summary>
        /// <returns></returns>
        static CreditInvoiceResponseType CreditInvoice() {
            int? ocrNumber = null;
            ocrNumber.ThrowIfNull("OCR number must be set!");
            var request = new CreditInvoiceRequest() {
                Request = new CreditInvoiceRequestType() {
                    IsInTestMode = true,
                    PrintSetup = PrintSetupType.EPdfPrint,
                    IsVatIncluded = 1,
                    Ocr = ocrNumber.Value,
                    CreditRows = new CreditRowsType() { 
                        new CreditRowType() {
                            ArticleNumber = "666",
                            Vat = 0,
                            Quantity = 1,
                            Price = 100
                        }
                    }
                }
            };
            Console.WriteLine("XML request: ");
            Console.WriteLine(XmlUtils.Serialize<CreditInvoiceRequest>(request));
            return Client.CreditInvoice(request).Response;
        }

        /// <summary>
        /// Initialization.
        /// </summary>
        static void Initialize() {
            var customerNo = ConfigurationManager.AppSettings.Get("customerNo");
            var authToken = ConfigurationManager.AppSettings.Get("authToken");
            var ipAddress = ConfigurationManager.AppSettings.Get("ipAddress");
            if (customerNo.IsEmpty() || authToken.IsEmpty()) {
                throw new ArgumentException("All examples requires customerNo, authToken and ipAddress to be set in App.config!");
            }
            int customerNumber = 0;
            if (! int.TryParse(customerNo, out customerNumber)) {
                throw new ArgumentException("CustomerNo must be an int!");
            }
            Client = new BookkeepingClient() {
                CustomerNumber = customerNumber,
                AuthToken = authToken,
                IpAddress = ipAddress
            };
        }

        /// <summary>
        /// Writes out all public fields.
        /// </summary>
        /// <typeparam name="T"></typeparam>
        /// <param name="response"></param>
        static void OutPutResponse<T>(T response) {
            var retval = "\nResponse: \n";
            var type = typeof(T);
            var propInfos = type.GetProperties();
            foreach (var propInfo in propInfos) {
                if (!propInfo.Name.Equals("ExtensionData")) {
                    retval += string.Format("{0}: {1}\n", propInfo.Name, propInfo.GetValue(response, null));
                }
            }
            Console.WriteLine(retval);
        }

    }

}
