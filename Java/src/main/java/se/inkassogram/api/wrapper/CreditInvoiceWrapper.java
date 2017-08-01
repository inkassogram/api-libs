package se.inkassogram.api.wrapper;

import java.util.ArrayList;
import java.util.List;

import se.inkassogram.api.client.BookkeepingClient;
import se.inkassogram.api.creditinvoice.CreditRowType;
import se.inkassogram.api.creditinvoice.CreditRowsType;
import se.inkassogram.api.creditinvoice.RequestType;
import se.inkassogram.api.creditinvoice.ResponseType;

public class CreditInvoiceWrapper {

	private RequestType request;
	CreditInvoiceWrapper(final String OCR){
		this.request = new RequestType();
		this.request.setTestCredit("true");
		this.request.setOcr(Integer.parseInt(OCR));
		this.request.setIncludingVat(1);
		this.request.setPrintSetup(1);
		this.request.setCreditRows(new CreditRowsType());
	}


	/**
	 * Adds a credit row
	 *
	 * @param articleNumber - The article number
	 * @param vat - VAT
	 * @param price - The amount credit
	 * @param quantity - The amount of articles.
	 */
	public void addCreditRow(final String articleNumber, final int vat, final int price, final float quantity){
		CreditRowType row = new CreditRowType();
		row.setArticleNo(articleNumber);
		row.setVat(vat);
		row.setPrice(price);
		row.setQuantity(quantity);
		this.request.getCreditRows().getCreditRow().add(row);
	}

	/**
	 * Sends the credit
	 *
	 * @return
	 * @throws Exception
	 */
	public ResponseType send() throws Exception{
		BookkeepingClient client = BookkeepingClientHandler.getClient();
		List<RequestType> requests = new ArrayList<RequestType>();
		requests.add(this.request);
		return client.creditInvoice(requests).getResponse().get(0);
	}
}
