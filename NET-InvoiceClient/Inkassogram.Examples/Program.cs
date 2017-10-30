using Inkassogram.Examples.InkassogramLiveWebService;
using Inkassogram.Examples.DataAccess.ServiceAgent;
using Inkassogram.Examples.Utils.Ext;
using System;
using System.Configuration;

namespace Inkassogram.Examples {

    /// <summary>
    /// Simple WS example program.
    /// </summary>
    internal class Program {

        /// <summary>
        /// The Authentication Token/Key used in all examples, see app.config.
        /// </summary>
        static string AuthToken { get; set; }

        /// <summary>
        /// The Customer number used in all examples, see app.config.
        /// </summary>
        static int CustomerNumber { get; set; }

        /// <summary>
        /// Main method.
        /// </summary>
        /// <param name="args"></param>
        static void Main(string[] args) {
            try {
                VerifySetup();
                string line;
                Console.WriteLine("Choose operation to invoke:\n");
                Console.WriteLine("1. SsnCheck\n");
                Console.WriteLine("2. InvoiceStatus\n");
                Console.WriteLine("3. InvoiceDetails\n");
                Console.WriteLine("4. ActivateInvoice\n");
                Console.WriteLine("5. ResendInvoice\n");
                Console.WriteLine("6. PauseInvoice\n");
                Console.WriteLine("7. SearchCompany\n");
                do {
                    line = Console.ReadLine();
                    if (line.IsNotNull()) {
                        switch (line) {
                            case "1":
                                OutPutResponse(SsnCheck());
                                break;
                            case "2":
                                OutPutResponse(InvoiceStatus());
                                break;
                            case "3":
                                OutPutResponse(InvoiceDetails());
                                break;
                            case "4":
                                OutPutResponse(ActivateInvoice());
                                break;
                            case "5":
                                OutPutResponse(ResendInvoice());
                                break;
                            case "6":
                                OutPutResponse(PauseInvoice());
                                break;
                            case "7":
                                OutPutResponse(SearchCompany());
                                break;
                            case "q":
                            case "quit":
                            case "exit":
                                return;
                            default:
                                Console.WriteLine("\nPlease choose an operation from 1-7.");
                                break;
                        }
                    }
                } while (line.IsNotNull());
            } catch (Exception ex) {
                Console.WriteLine("\nAn exception occured, press CTRL+Z to exit or enter 'q', 'quit' or 'exit'.\n\nException: {0}", ex.Message);
                Console.ReadLine();
            }
        }

        static SsnCheckResponseType SsnCheck() {
            string orgOrSsn = null;
            ThrowIfNull(orgOrSsn, "Organizational number or social security number must be set!");
            return InvoiceServiceAgent.Instance().SsnCheck(new SsnCheckRequestType() {
                key = AuthToken,
                customerno = CustomerNumber,
                ssn = orgOrSsn,
                credit_check = 0
            });
        }

        static InvoiceStatusResponseType InvoiceStatus() {
            int? ocrNumber = null;
            ThrowIfNull(ocrNumber, "OCR number must be set!");
            return InvoiceServiceAgent.Instance().InvoiceStatus(new InvoiceStatusRequestType() {
                key = AuthToken,
                customerno = CustomerNumber,
                ocr = ocrNumber.Value
            });
        }

        static InvoiceDetailsResponseType InvoiceDetails() {
            int? ocrNumber = null;
            ThrowIfNull(ocrNumber, "OCR number must be set!");
            return InvoiceServiceAgent.Instance().InvoiceDetails(new InvoiceDetailsRequestType() {
                key = AuthToken,
                customerno = CustomerNumber,
                ocr = ocrNumber.Value
            });
        }

        static ActivateInvoiceResponseType ActivateInvoice() {
            int? ocrNumber = null;
            ThrowIfNull(ocrNumber, "OCR number must be set!");
            return InvoiceServiceAgent.Instance().ActivateInvoice(new ActivateInvoiceRequestType() {
                key = AuthToken,
                customerno = CustomerNumber,
                ocr = ocrNumber.Value
            });
        }

        static ResendInvoiceResponseType ResendInvoice() {
            int? ocrNumber = null;
            ThrowIfNull(ocrNumber, "OCR number must be set!");
            return InvoiceServiceAgent.Instance().ResendInvoice(new ResendInvoiceRequestType() {
                key = AuthToken,
                customerno = CustomerNumber,
                ocr = ocrNumber.Value,
                co_address1 = "This",
                co_address2 = "is",
                co_address3 = "only",
                co_address4 = "a",
                co_address5 = "test",
                print_setup = 1,
                invoice_state = 1,
                clear_co_address = true
            });
        }

        static PauseInvoiceResponseType PauseInvoice() {
            int? ocrNumber = null;
            ThrowIfNull(ocrNumber, "OCR number must be set!");
            return InvoiceServiceAgent.Instance().PauseInvoice(new PauseInvoiceRequestType() {
                key = AuthToken,
                customerno = CustomerNumber,
                ocr = ocrNumber.Value
            });
        }

        static SearchCompanyResponseType SearchCompany() {
            return InvoiceServiceAgent.Instance().SearchCompany(new SearchCompanyRequestType() {
                key = AuthToken,
                customerno = CustomerNumber,
                company_name = "Inkassogram",
                phonetic_search = true,
                number_hits = 10
            });
        }

        /// <summary>
        /// Example null checker.
        /// </summary>
        /// <param name="obj"></param>
        /// <param name="message"></param>
        static void ThrowIfNull(object obj, string message) {
            if (obj == null) {
                throw new ArgumentException(message);
            }
        }

        /// <summary>
        /// Verifies setup.
        /// </summary>
        static void VerifySetup() {
            var customerNumber = ConfigurationManager.AppSettings.Get("customerNo");
            var authToken = ConfigurationManager.AppSettings.Get("authToken");
            if (string.IsNullOrWhiteSpace(authToken) || string.IsNullOrWhiteSpace(customerNumber)) {
                throw new ArgumentException("All examples requires customerNo and authToken to be set in App.config.");
            }
            int customerNo = -1;
            if (!int.TryParse(customerNumber, out customerNo)) {
                throw new ArgumentException("customerNo must be an int.");
            }
            CustomerNumber = customerNo;
            AuthToken = authToken;
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
