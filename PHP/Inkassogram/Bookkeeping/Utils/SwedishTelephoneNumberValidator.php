<?php
/**
 * Inkassogram Bookkeeping API Client
 *
 * @author      Inkassogram <dev@inkassogram.se>
 * @author      Simon Stal <simon@inkassogram.se>
 * @copyright   2017 Inkassogram AB (publ)
 * @version     2.0.0
 * @package     Inkassogram
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
 
namespace Inkassogram\Bookkeeping\Utils;

/**
 * Swedish telephone number validation utilities.
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class SwedishTelephoneNumberValidator
{

	/**
	 * Checks if a number is a valid mobile phone number.
	 * </p>
	 * @param $phoneNumber
	 * $return {@code TRUE} if valid
	 */
	public static function isValid($phoneNumber)
	{
		$phoneNumber = self::fixMsisdn($phoneNumber);
		if ($phoneNumber === false) {
			return false;
		}
		if (substr($phoneNumber, 0, 2) == '46' && substr($phoneNumber, 0, 3) != '467') { 
			return false;
		}
		return true;
	}
	
	/**
	 * Formats a phone number into 4670XXXXXXX standard.
	 * </p>
	 * @param $phoneNumber the phone number to format
	 * @param $country which country the phone number belongs to
	 * @return msisdn on success otherwise false
	 */
	private static function fixMsisdn($phoneNumber, $country = 'sweden') {
		if (! is_string($phoneNumber)) {
			return false;
		}
		$phoneNumber = trim($phoneNumber);
		$phoneNumber = preg_replace("@^(.+?)(\(.+?)\)@", '$1', $phoneNumber);
		$phoneNumber = preg_replace("@[^0-9]@", '', $phoneNumber);
		if (strncmp($phoneNumber, '00', 2) == 0) {
			$phoneNumber=substr($phoneNumber, 2);
		}
		if (strncmp($phoneNumber, '0', 1) == 0) {
			$phoneNumber = '46' . substr($phoneNumber, 1);
		}
		if (strlen($phoneNumber) < 5 || strlen($phoneNumber) > 15) {
			return false;
		}
		return $phoneNumber;
	}
	
}

?>	
	
