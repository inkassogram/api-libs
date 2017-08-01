package se.inkassogram.api.utils;

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

import java.io.UnsupportedEncodingException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

/**
 * Encryption helpers.
 *
 * @author <a href="mailto:dev@inkassogram.se">Inkassogram</a>
 * @since  1.0.0
 */
public class EncryptionUtils {

    private static String CHARSET = "UTF-8";
    
    private static String ENCRYPTION = "MD5";
    
    public static String hash(String str) 
    {
        try {
            byte[] strBytes = str.getBytes(CHARSET);
            MessageDigest md = MessageDigest.getInstance(ENCRYPTION);
            byte[] encryptedBytes = md.digest(strBytes);
            StringBuffer sb = new StringBuffer();
            for (int i = 0; i < encryptedBytes.length; ++i) {
                sb.append(Integer.toHexString((encryptedBytes[i] & 0xFF) | 0x100).substring(1,3));
            }
            return sb.toString();
        } catch (UnsupportedEncodingException e) {
            
        } catch (NoSuchAlgorithmException e) {
            
        }
        return null;
    }
    
}
