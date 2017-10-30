using Inkassogram.Examples.InkassogramLiveWebService;

namespace Inkassogram.Examples.DataAccess.ServiceAgent {


    public interface IInvoiceServiceAgent {

        /// <summary>
        /// Returns "folkbokföringsadress/sätesadress" and "kreditvärdighet".
        /// </summary>
        SsnCheckResponseType SsnCheck(SsnCheckRequestType request);

        /// <summary>
        /// Returns invoice status of payment.
        /// </summary>
        InvoiceStatusResponseType InvoiceStatus(InvoiceStatusRequestType request);

        /// <summary>
        /// Returns invoice details of recipient.
        /// </summary>
        InvoiceDetailsResponseType InvoiceDetails(InvoiceDetailsRequestType request);

        /// <summary>
        /// Activates a reserved invoice.
        /// </summary>
        ActivateInvoiceResponseType ActivateInvoice(ActivateInvoiceRequestType request);

        /// <summary>
        /// Resend an invoice to a debtor.
        /// </summary>
        ResendInvoiceResponseType ResendInvoice(ResendInvoiceRequestType request);

        /// <summary>
        /// Pauses an invoice.
        /// </summary>
        PauseInvoiceResponseType PauseInvoice(PauseInvoiceRequestType request);

        /// <summary>
        /// Returns organizational details.
        /// </summary>
        SearchCompanyResponseType SearchCompany(SearchCompanyRequestType request);

    }

}
