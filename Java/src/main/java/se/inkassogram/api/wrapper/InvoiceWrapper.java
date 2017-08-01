package se.inkassogram.api.wrapper;

import java.util.ArrayList;
import java.util.List;

import se.inkassogram.api.client.BookkeepingClient;
import se.inkassogram.api.createinvoicebookkeeping.RequestType;
import se.inkassogram.api.createinvoicebookkeeping.ResponseType;
import se.inkassogram.api.createinvoicebookkeeping.RowType;
import se.inkassogram.api.creditinvoice.CreditRowType;
import se.inkassogram.api.creditinvoice.CreditRowsType;

/**
 * A simple wrapper for the Invoice creation.
 *
 * @author bastos
 */
public class InvoiceWrapper {

	private final RequestType request;

	/**
	 * Creates an Invoice wrapper.
	 *
	 * @param orgOrSsn - The organizational or social security number.
	 * @param orderNumber - The reference invoice.
	 * @param confirmationEmail - The address to send a confirmation email.
	 */
	 InvoiceWrapper(final String orgOrSsn, final String orderNumber, final String confirmationEmail){
		this.request = new RequestType();
		this.request.setTestInvoice("true");
		this.request.setService(1);
		this.request.setPrintSetup(0);
		this.request.setSsn(orgOrSsn);
		this.request.setEmail(confirmationEmail);
		this.request.setMakeInvoiceReservation(0);
	}

	/**
	 * Adds a simple row;
	 *
	 * @param price - The price represented as cents
	 * @param vat - The VAT
	 * @param articleNumber - Article number as provided
	 * @param text - article name
	 * @param quantity - Amount of articles
	 * @return InvoiceWrapper with an updated row
	 */
	public InvoiceWrapper addRow(final int price, final int vat, final String articleNumber, final String text, final float quantity){
		RowType row = new RowType();
		row.setArticleNo(articleNumber);
		row.setText(text);
		row.setVat(vat);
		row.setPrice(price);
		row.setQuantity(quantity);
		this.request.getInvoiceRows().getRow().add(row);
		return this;
	}

	/**
	 * Sends the created invoice
	 *
	 * @return ResponseType
	 * @throws Exception if an error occurs while sending the request.
	 */
	public ResponseType send() throws Exception {
		BookkeepingClient client = BookkeepingClientHandler.getClient();
		return client.createInvoice(request).getResponse();		
	}
}
