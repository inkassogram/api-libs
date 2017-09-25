using System.IO;
using System.Text;
using System.Xml.Serialization;

namespace Inkassogram.Examples.Utils {
    
    /// <summary>
    /// XML Helper functions.
    /// </summary>
    internal static class XmlUtils {

        /// <summary>
        /// Serialize an object to XML.
        /// </summary>
        /// <typeparam name="T"></typeparam>
        /// <param name="obj"></param>
        public static string Serialize<T>(T obj) {
            var serializer = new XmlSerializer(typeof(T));
            using (var writer = new Utf8StringWriter()) {
                serializer.Serialize(writer, obj);
                return writer.ToString();
            }
        }

        /// <summary>
        /// Deserialize a stream to an object.
        /// </summary>
        /// <typeparam name="T"></typeparam>
        /// <param name="stream"></param>
        public static T Deserialize<T>(StreamReader stream) {
            var serializer = new XmlSerializer(typeof(T));
            var retval = serializer.Deserialize(stream);
            return (T) retval;
        }

    }

    /// <summary>
    /// UTF-8 String Writer.
    /// </summary>
    public class Utf8StringWriter : StringWriter {
        public override Encoding Encoding {
            get { return Encoding.UTF8; }
        }
    }

}
