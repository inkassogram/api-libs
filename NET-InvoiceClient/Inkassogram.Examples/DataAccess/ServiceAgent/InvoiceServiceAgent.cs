using Inkassogram.Examples.InkassogramLiveWebService;
using Inkassogram.Examples.Utils.Ext;
using System.Threading;

namespace Inkassogram.Examples.DataAccess.ServiceAgent {

    internal class InvoiceServiceAgent : IInvoiceServiceAgent {

        /// <summary>
        /// The instance.
        /// </summary>
        static InvoiceServiceAgent _instance;

        /// <summary>
        /// WS Client instance.
        /// </summary>
        static InvoiceServiceClient _client;

        /// <summary>
        /// Prevent threads from re-initialize.
        /// </summary>
        static readonly object _lock = new object();

        /// <summary>
        /// Default constructor.
        /// </summary>
        protected InvoiceServiceAgent() {
            _client = new InvoiceServiceClient();
        }

        /// <summary>
        /// Returns a thread safe instance.
        /// </summary>
        public static InvoiceServiceAgent Instance() {
            if (_instance.IsNull()) {
                lock (_lock) {
                    Thread.MemoryBarrier();
                    if (_instance.IsNull()) {
                        _instance = new InvoiceServiceAgent();
                    }
                }
            }
            return _instance;
        }

        /// <summary>
        /// Returns "folkbokföringsadress/sätesadress" and "kreditvärdighet".
        /// </summary>
        public SsnCheckResponseType SsnCheck(SsnCheckRequestType request) {
            request.ThrowIfNull();
            return _client.SsnCheck(request);
        }

        /// <summary>
        /// Returns invoice status of payment.
        /// </summary>
        public InvoiceStatusResponseType InvoiceStatus(InvoiceStatusRequestType request) {
            request.ThrowIfNull();
            return _client.InvoiceStatus(request);
        }

        /// <summary>
        /// Returns invoice details of recipient.
        /// </summary>
        public InvoiceDetailsResponseType InvoiceDetails(InvoiceDetailsRequestType request) {
            request.ThrowIfNull();
            return _client.InvoiceDetails(request);
        }

        /// <summary>
        /// Activates a reserved invoice.
        /// </summary>
        public ActivateInvoiceResponseType ActivateInvoice(ActivateInvoiceRequestType request) {
            request.ThrowIfNull();
            return _client.ActivateInvoice(request);
        }

        /// <summary>
        /// Resend an invoice to a debtor.
        /// </summary>
        public ResendInvoiceResponseType ResendInvoice(ResendInvoiceRequestType request) {
            request.ThrowIfNull();
            return _client.ResendInvoice(request);
        }

        /// <summary>
        /// Pauses an invoice.
        /// </summary>
        public PauseInvoiceResponseType PauseInvoice(PauseInvoiceRequestType request) {
            request.ThrowIfNull();
            return _client.PauseInvoice(request);
        }

        /// <summary>
        /// Returns organizational details.
        /// </summary>
        public SearchCompanyResponseType SearchCompany(SearchCompanyRequestType request) {
            request.ThrowIfNull();
            return _client.SearchCompany(request);
        }

    }

}
