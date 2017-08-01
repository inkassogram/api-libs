//
// This file was generated by the JavaTM Architecture for XML Binding(JAXB) Reference Implementation, vhudson-jaxb-ri-2.1-2 
// See <a href="http://java.sun.com/xml/jaxb">http://java.sun.com/xml/jaxb</a> 
// Any modifications to this file will be lost upon recompilation of the source schema. 
// Generated on: 2017.10.12 at 09:28:52 AM CEST 
//


package se.inkassogram.api.creditinvoice;

import javax.xml.bind.JAXBElement;
import javax.xml.bind.annotation.XmlElementDecl;
import javax.xml.bind.annotation.XmlRegistry;
import javax.xml.namespace.QName;


/**
 * This object contains factory methods for each 
 * Java content interface and Java element interface 
 * generated in the se.inkassogram.api.creditinvoice package. 
 * <p>An ObjectFactory allows you to programatically 
 * construct new instances of the Java representation 
 * for XML content. The Java representation of XML 
 * content can consist of schema derived interfaces 
 * and classes representing the binding of schema 
 * type definitions, element declarations and model 
 * groups.  Factory methods for each of these are 
 * provided in this class.
 * 
 */
@XmlRegistry
public class ObjectFactory {

    private final static QName _MethodCall_QNAME = new QName("http://www.inkassogram.se/API/creditInvoice", "methodCall");

    /**
     * Create a new ObjectFactory that can be used to create new instances of schema derived classes for package: se.inkassogram.api.creditinvoice
     * 
     */
    public ObjectFactory() {
    }

    /**
     * Create an instance of {@link CreditRowsType }
     * 
     */
    public CreditRowsType createCreditRowsType() {
        return new CreditRowsType();
    }

    /**
     * Create an instance of {@link MethodCallType }
     * 
     */
    public MethodCallType createMethodCallType() {
        return new MethodCallType();
    }

    /**
     * Create an instance of {@link ResponseType }
     * 
     */
    public ResponseType createResponseType() {
        return new ResponseType();
    }

    /**
     * Create an instance of {@link CreditRowType }
     * 
     */
    public CreditRowType createCreditRowType() {
        return new CreditRowType();
    }

    /**
     * Create an instance of {@link RequestType }
     * 
     */
    public RequestType createRequestType() {
        return new RequestType();
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link MethodCallType }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://www.inkassogram.se/API/creditInvoice", name = "methodCall")
    public JAXBElement<MethodCallType> createMethodCall(MethodCallType value) {
        return new JAXBElement<MethodCallType>(_MethodCall_QNAME, MethodCallType.class, null, value);
    }

}
