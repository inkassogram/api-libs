package se.inkassogram.api.wrapper;

import se.inkassogram.api.createinvoicebookkeeping.ResponseType;

public class Example {

	/**
	 * Sends an invoice
	 */
	public void sendInvoice(){
		String orgOrSsn = "5567854616";
		String orderNumber = "1";
		String email = "foo@bar.baz";

		int rowPrice1 = 10000;
		int rowVat1 = 25;
		String rowArticleNumber1 = "1004";
		String rowText1 = "Taxi ride";
		float rowQuantity1 = 1f;

		int rowPrice2 = 1000;
		int rowVat2 = 25;
		String rowArticleNumber2 = "9005";
		String rowText2 = "Cookie";
		float rowQuantity2 = 100f;

		InvoiceWrapper invoice = InkassogramWrapper.createInvoice(orgOrSsn, orderNumber, email);
		invoice.addRow(rowPrice1, rowVat1, rowArticleNumber1, rowText1, rowQuantity1);
		invoice.addRow(rowPrice2, rowVat2, rowArticleNumber2, rowText2, rowQuantity2);

		try{
			ResponseType response = invoice.send();
		} catch (Exception e){
			e.printStackTrace();
		}
	}
}
