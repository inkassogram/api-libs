package se.inkassogram.api.wrapper;

/**
 * A wrapper for handling simple calls.
 *
 * @author bastos
 *
 */
public class InkassogramWrapper {

	/**
	 * Creates a provisional invoice to be sent.
	 *
	 * @param orgOrSsn - The organizational or social security number.
	 * @param orderNumber - The reference invoice.
	 * @param confirmationEmail - The address to send a confirmation email.
	 * @return InvoiceWrapper
	 */
	public static InvoiceWrapper createInvoice(final String orgOrSsn, final String orderNumber, final String confirmationEmail){
		return new InvoiceWrapper(orgOrSsn, orderNumber, confirmationEmail);
	}

	/**
	 * Credit an invoice
	 *
	 * @param OCR - The Inkassogram invoice retrieved as a result of creating an invoice.
	 * @return CreditInvoiceWrapper
	 */
	public static CreditInvoiceWrapper createCreditInvoice(final String OCR){
		return new CreditInvoiceWrapper(OCR);
	}

}
