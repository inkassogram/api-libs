using System;

namespace Inkassogram.Examples.Utils {
    
    /// <summary>
    /// DateTime helper functions.
    /// </summary>
    internal static class DateTimeUtils {

        /// <summary>
        /// To Unix time.
        /// </summary>
        /// <param name="date"></param>
        public static int UnixTime(DateTime date) {
            TimeSpan span = date - new DateTime(1970, 1, 1, 0, 0, 0, 0, DateTimeKind.Utc);
            return (int) span.TotalSeconds;
        }

    }

}
