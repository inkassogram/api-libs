package se.inkassogram.api.examples;

/**
 * Inkassogram Bookkeeping API Client
 *
 * @author    <a href="mailto:dev@inkassogram.se">Inkassogram</a>
 * @version   1.0.0
 *
 * MIT LICENSE
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

import java.io.IOException;
import java.lang.reflect.Field;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;
import java.util.UUID;

import org.apache.http.client.ClientProtocolException;

import se.inkassogram.api.client.BookkeepingClient;
import se.inkassogram.api.createinvoicebookkeeping.InvoiceRowsType;
import se.inkassogram.api.createinvoicebookkeeping.RowType;
import se.inkassogram.api.creditinvoice.CreditRowType;
import se.inkassogram.api.creditinvoice.CreditRowsType;


/**
 * Simple example of client usage.
 *
 * @author <a href="mailto:dev@inkassogram.se">Inkassogram</a>
 * @since  1.0.0
 */
public class App {
    
    private static BookkeepingClient client;
    
    /**
     * Operation examples.
     * @param args
     */
    public static void main(String[] args) 
    {
        Scanner scanner = null;
        try {
            client = new BookkeepingClient();
            System.out.println("Choose operation to invoke:\n");
            System.out.println("1. Create invoice");
            System.out.println("2. Credit invoice");
            scanner = new Scanner(System.in);
            while(scanner.hasNextLine()){
                String line = scanner.nextLine();
                line = (line != null) ? line.trim().toLowerCase() : "";
                if (line.equals("1")) {
                    outPutResponse(createInvoice());
                } else if (line.equals("2")) {
                    outPutResponse(creditInvoice());
                } else if (line.equals("q") || line.equals("quit") || line.equals("exit")) {
                    System.exit(0);
                } else {
                    System.out.println("\nPlease choose an operation from 1-7.");
                }
            }
            scanner.close();
        } catch(Exception ex) {
        	System.out.println(ex.getMessage());
            System.out.println(String.format("\nAn exception occured, press CTRL+C to exit or enter 'q', 'quit' or 'exit'.\n\nException: %s %s", ex.getMessage(), ex.getStackTrace()));
        } finally {
            if (scanner != null) {
                scanner.close();
            }
        }
    }
    
    /**
     * Creates an invoice.
     * @return ResponseType
     * @throws ClientProtocolException
     * @throws IOException
     */
    static se.inkassogram.api.createinvoicebookkeeping.ResponseType createInvoice() 
            throws ClientProtocolException, IOException 
    {
    	
        String orgOrSsn = ""; // Edit this
        String emailAddress = ""; // Edit this
        throwIfNull(orgOrSsn, "Organizational number or social security number must be set!");
        throwIfNull(emailAddress, "E-mail address must be set!");
        se.inkassogram.api.createinvoicebookkeeping.RequestType request = new se.inkassogram.api.createinvoicebookkeeping.RequestType();
        request.setTestInvoice("true");
        request.setService(1);
        request.setPrintSetup(1);
        request.setSsn(orgOrSsn);
        request.setEmail(emailAddress);
        request.setOrderNo(UUID.randomUUID().toString());
        request.setInvoiceRows(new InvoiceRowsType());
        request.setMakeInvoiceReservation(0);
        RowType row1 = new RowType();
        row1.setArticleNo("1234");
        row1.setText("USB Kingston");
        row1.setVat(25);
        row1.setPrice(20000);
        row1.setQuantity(5f);
        row1.setBookkeepingAccount(3010);
        RowType row2 = new RowType();
        row2.setArticleNo("5678");
        row2.setText("Support");
        row2.setVat(25);
        row2.setPrice(10000);
        row2.setQuantity(2f);
        row2.setUnit("h");
        row2.setBookkeepingAccount(3010);
        request.getInvoiceRows().getRow().add(row1);
        request.getInvoiceRows().getRow().add(row2);
        return client.createInvoice(request).getResponse();
    }
    
    /**
     * Credits an invoice.
     * @return ResponseType
     * @throws ClientProtocolException
     * @throws IOException
     */
    static se.inkassogram.api.creditinvoice.ResponseType creditInvoice() 
            throws ClientProtocolException, IOException 
    {
        Integer ocrNumber = null;
        throwIfNull(ocrNumber, "OCR number must be set!");
        se.inkassogram.api.creditinvoice.RequestType request = new se.inkassogram.api.creditinvoice.RequestType();
        request.setTestCredit("true");
        request.setOcr(ocrNumber);
        request.setIncludingVat(1);
        request.setPrintSetup(1);
        request.setCreditRows(new CreditRowsType());
        CreditRowType row1 = new CreditRowType();
        row1.setArticleNo("1234");
        row1.setVat(25);
        row1.setPrice(20000);
        row1.setQuantity(5f);
        CreditRowType row2 = new CreditRowType();
        row2.setArticleNo("5678");
        row2.setVat(25);
        row2.setPrice(10000);
        row2.setQuantity(2f);
        request.getCreditRows().getCreditRow().add(row1);
        request.getCreditRows().getCreditRow().add(row2);
        List<se.inkassogram.api.creditinvoice.RequestType> requests = new ArrayList<se.inkassogram.api.creditinvoice.RequestType>();
        requests.add(request);
        return client.creditInvoice(requests).getResponse().get(0);
    }
    
    /**
     * Null checker.
     * @param obj the object to be tested
     * @param str exception message
     * @throws IllegalArgumentException
     */
    static void throwIfNull(Object obj, String str) {
        if (obj == null) {
            throw new IllegalArgumentException(str);
        }
    }
    
    /**
     * Writes out all public fields.
     * @param T response
     */
    static <T> void outPutResponse(T response) {
        String retval = "\nResponse: \n";
        Class<?> clazz = response.getClass();
        Field[] fields = clazz.getDeclaredFields();
        for (Field field : fields) {
            field.setAccessible(true);
            if (!field.getName().equalsIgnoreCase("ExtensionData")) {
                try {
                    retval += String.format("%s: %s\n", field.getName(), field.get(response));
                } catch (IllegalArgumentException e) {
                    e.printStackTrace();
                } catch (IllegalAccessException e) {
                    e.printStackTrace();
                }
            }
        }
        System.out.println(retval);
    }
    
}
