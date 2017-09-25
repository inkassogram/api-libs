using System.Xml.Serialization;

namespace Inkassogram.Examples.Contracts {

    /// <summary>
    /// Type of Print.
    /// EPdfPrint - E-faktura, PDF
    /// ManualPrint - Printa själv
    /// PrintOnDemand - Print on Demand
    /// SmsPrint - SMS Faktura
    /// </summary>
    public enum PrintSetupType {
        [XmlEnum(Name = "1")]
        EPdfPrint = 1,
        [XmlEnum(Name = "2")]
        ManualPrint = 2,
        [XmlEnum(Name = "3")]
        PrintOnDemand = 3,
        [XmlEnum(Name = "4")]
        SmsPrint = 4
    }

    /// <summary>
    /// Type of invoice service.
    /// InvoiceService - Fakturaservice
    /// InvoiceDiscounting - Fakturabelåning
    /// Factoring - Factoring
    /// </summary>
    public enum ServiceType {
        [XmlEnum(Name = "1")]
        InvoiceService = 1,
        [XmlEnum(Name = "2")]
        InvoiceDiscounting = 2,
        [XmlEnum(Name = "3")]
        Factoring = 3
    }

}
