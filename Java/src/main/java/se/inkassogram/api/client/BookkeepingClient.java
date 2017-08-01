package se.inkassogram.api.client;

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
import java.io.InputStream;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;
import java.util.Properties;

import javax.xml.bind.JAXBElement;
import javax.xml.bind.JAXBException;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import se.inkassogram.api.createinvoicebookkeeping.MethodCallType;
import se.inkassogram.api.utils.EncryptionUtils;
import se.inkassogram.api.utils.XmlUtils;

/**
 * The Bookkeeping API client. 
 *
 * @author <a href="mailto:dev@inkassogram.se">Inkassogram</a>
 * @since  1.0.0
 */
public class BookkeepingClient {
    
    /**
     * Logging.
     */
    static Logger log = LoggerFactory.getLogger(BookkeepingClient.class);
    
    /**
     * The customer number.
     */
    Integer customerNo;
    
    /**
     * The Authentication token/key.
     */
    String authToken;
    
    /**
     * The IP address.
     */
    String ipAddress;
    
    /**
     * The .properties file name.
     */
    static final String defaultPropertiesFile = "bookkeeping-api.properties";
    
    /**
     * The read properties.
     */
    static Properties properties;
    
    /**
     * Read lock to prevent re-initialization.
     */
    static final Object readLock = new Object();
    
    /**
     * The endpoint URL.
     */
    static final String createInvoiceEndpointUrl = "https://api.inkassogram.se/API/createInvoiceBookkeeping";

    /**
     * The endpoint URL.
     */
    static final String creditInvoiceEndpointUrl = "https://api.inkassogram.se/API/creditInvoice";
    
    /**
     * Default constructor.
     */
    public BookkeepingClient() 
    {
        
    }
    
    /**
     * Contructor with params.
     * 
     * @param customerNo
     * @param authToken
     * @param ipAddress
     */
    public BookkeepingClient(Integer customerNo, String authToken, String ipAddress)
    {
        this.setCustomerNo(customerNo);
        this.setAuthToken(authToken);
        this.setIpAddress(ipAddress);
    }
    
    /**
     * Creates an invoice.
     * 
     * @param  request
     * @return MethodCallType
     * @throws ClientProtocolException
     * @throws IOException
     */
    public se.inkassogram.api.createinvoicebookkeeping.MethodCallType createInvoice(se.inkassogram.api.createinvoicebookkeeping.RequestType request) 
            throws ClientProtocolException, IOException 
    {
        se.inkassogram.api.createinvoicebookkeeping.ObjectFactory objectFactory = new se.inkassogram.api.createinvoicebookkeeping.ObjectFactory();
        se.inkassogram.api.createinvoicebookkeeping.MethodCallType methodCallType = new se.inkassogram.api.createinvoicebookkeeping.MethodCallType();
        methodCallType.setMethodName("createInvoice");
        methodCallType.setRequest(request);        
        JAXBElement<se.inkassogram.api.createinvoicebookkeeping.MethodCallType> methodCall = objectFactory.createMethodCall(methodCallType);
        MethodCallType callType =  sendRequest(createInvoiceEndpointUrl, methodCall, se.inkassogram.api.createinvoicebookkeeping.MethodCallType.class);
        return callType;
    }
    
    /**
     * Credits an invoice.
     * 
     * @param  request
     * @return List<ResponseType>
     * @return MethodCallType
     * @throws ClientProtocolException
     * @throws IOException
     */
    public se.inkassogram.api.creditinvoice.MethodCallType creditInvoice(List<se.inkassogram.api.creditinvoice.RequestType> request) 
            throws ClientProtocolException, IOException
    {
        se.inkassogram.api.creditinvoice.ObjectFactory objectFactory = new se.inkassogram.api.creditinvoice.ObjectFactory();
        se.inkassogram.api.creditinvoice.MethodCallType methodCallType = new se.inkassogram.api.creditinvoice.MethodCallType();
        methodCallType.setMethodName("creditInvoice");
        methodCallType.getRequest().addAll(request);
        JAXBElement<se.inkassogram.api.creditinvoice.MethodCallType> methodCall = objectFactory.createMethodCall(methodCallType);
        return sendRequest(creditInvoiceEndpointUrl, methodCall, se.inkassogram.api.creditinvoice.MethodCallType.class);
    }
    
    /**
     * Sends a POST request.
     * 
     * @param  object
     * @throws ClientProtocolException 
     * @throws IOException 
     */
    <TRequest, TResponse> TResponse sendRequest(String url, JAXBElement<TRequest> requestObject, Class<TResponse> responseObject) 
            throws IOException, ClientProtocolException 
    {
        loadProperties();
        DefaultHttpClient httpClient = new DefaultHttpClient();
        HttpPost httpPost = new HttpPost(url);
        SimpleDateFormat formatter = new SimpleDateFormat("yyyyMMdd");
        
        String key = EncryptionUtils.hash((getIpAddress() + formatter.format(new Date()) + getAuthToken()));
        httpPost.addHeader("accept", "application/xml");
        httpPost.addHeader("customerNo", getCustomerNo().toString());
        httpPost.addHeader("key", key);
        
        try {
            String data = XmlUtils.serialize(requestObject);
            StringEntity stringEntity = new StringEntity(data);
            stringEntity.setContentType("application/xml");
            stringEntity.setContentEncoding("UTF-8");
            httpPost.setEntity(stringEntity);
            log.debug(String.format("XML request: ", data));
            HttpResponse response = httpClient.execute(httpPost);
            HttpEntity entity = response.getEntity();
            if (entity != null) {
                InputStream instream = entity.getContent();
                try {
                    InputStream is = response.getEntity().getContent();
                    return XmlUtils.deserialize(is, responseObject);
                } catch (IOException e) {
                    throw e;
                } catch (RuntimeException e) {
                    httpPost.abort();
                    throw e;
                } finally {
                    try { 
                        instream.close();  
                    }
                    catch (Exception e) {
                        log.warn("Cannot close response stream.", e);    
                    }
                }
            } else {
                throw new ClientProtocolException("Response contains no content");
            }
        } catch (JAXBException e) {
            throw new ClientProtocolException("Malformed XML", e);
        } finally {
            httpClient.getConnectionManager().shutdown();
        }
    }

    /**
     * Loads the .properties file and sets authToken, customerNo
     * and ipAddress.
     * 
     * @throws IOException 
     */
    void loadProperties() throws IOException {
        if (
            getCustomerNo() == null ||
            getAuthToken() == null || 
            getIpAddress() == null
        ) {
            if (properties == null) {
                synchronized(readLock) {
                    if (properties == null) {
                        log.debug(String.format("Loading properties from %s.", defaultPropertiesFile));
                        ClassLoader loader = BookkeepingClient.class.getClassLoader();
                        InputStream in = loader.getResourceAsStream(defaultPropertiesFile);
                        properties = new Properties();
                        properties.load(in);
                        this.setCustomerNo(Integer.parseInt(properties.getProperty("customerNo")));
                        this.setAuthToken(properties.getProperty("authToken"));
                        this.setIpAddress(properties.getProperty("ipAddress"));    

                        System.out.println(properties.getProperty("authToken"));
System.out.println(properties.getProperty("ipAddress"));
System.out.println(properties.getProperty("customerNo"));

                }
            }
        }
    }
    }

    /**
     * Returns the customer number.
     */
    public Integer getCustomerNo() {
        return customerNo;
    }

    /**
     * Sets the customer number.
     * @param customerNo
     */
    public void setCustomerNo(Integer customerNo) {
        this.customerNo = customerNo;
    }

    /**
     * Returns the authentication token/key.
     */
    public String getAuthToken() {
        return authToken;
    }

    /**
     * Sets the authentication token/key.
     * @param authToken
     */
    public void setAuthToken(String authToken) {
        this.authToken = authToken;
    }

    /**
     * Returns the IP address.
     */
    public String getIpAddress() {
        return ipAddress;
    }

    /**
     * Sets the IP address.
     * @param ipAddress
     */
    public void setIpAddress(String ipAddress) {
        this.ipAddress = ipAddress;
    }
    
}
