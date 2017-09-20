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
 * Organizational or Personal Identity Number validation utilities.
 *
 * @package Inkassogram
 * @author  Inkassogram <dev@inkassogram.se>
 * @author  Simon Stal <simon@inkassogram.se>
 * @since   2.0.0
 */
class OrganizationalOrPersonalIdentityNumberValidator
{

	/**
     * Validates either Personal Identity Number or an Organizational Number.
     * </p>
     * @param str the personal identity or organization number.
     * @param ctx the restraint.
     * @return {@code TRUE} if valid.
     */
	public static function isValid($organizationalOrPersonalIdentityNumber)
	{
		if (! isset($organizationalOrPersonalIdentityNumber)) {
			return false;
		}
		return (self::isValidOrganizationalNumber($organizationalOrPersonalIdentityNumber) || self::isValidPersonalIdentityNumber($organizationalOrPersonalIdentityNumber));
	}
	
	/**
     * Validates a Swedish organisationsnummer.
     * </p>
     * <a href="http://www.skatteverket.se/download/18.70ac421612e2a997f85800040284/70909.pdf">Organisationsnummer dokumentation</a>
     * </p>
     * @param organizationalNumber
     * @return {@code TRUE} if valid.
     */
    private static function isValidOrganizationalNumber($organizationalNumber)
    {
        // Remove any century indicator.
        $organizationalNumber = str_replace('+', '', $organizationalNumber);
		$organizationalNumber = str_replace('-', '', $organizationalNumber);
        // Must be exactly 12 characters.
        if (strlen($organizationalNumber) !== 10) {
			return false;
        }
		// The third digit is always above 1 to avoid confusion.
		$thirdDigit = (int) substr($organizationalNumber, 2, 1);
		if ($thirdDigit < 2) {
			return false;
		}
		// Check the control digit.
		$controlDigit = (int) substr($organizationalNumber, -1, 1);
		if ($controlDigit != self::calculateControlDigit($organizationalNumber)) {    
			return false;
		}
        return true;
    }
    
    /**
     * Validates a Swedish personnummer (Personal Identity Number).
     * </p>
     * <a href="http://www.skatteverket.se/download/18.1e6d5f87115319ffba2.0.01883/70408svartvit.pdf">Personnummer dokumentation</a>
     * </p>
     * @param personalIdentityNumber
     * @return {@code TRUE} if valid.
     */
    public static function isValidPersonalIdentityNumber($personalIdentityNumber)
    {
        // Remove any century indicator.
		$personalIdentityNumber = str_replace('+', '', $personalIdentityNumber);
		$personalIdentityNumber = str_replace('-', '', $personalIdentityNumber);
        // Must be 12 characters.
        if (strlen($personalIdentityNumber) !== 12) {
            return false;
        }
        // Validate the century.
        $validCenturies = array('18', '19', '20');
        $century = substr($personalIdentityNumber, 0, 2);
        if (! in_array($century, $validCenturies)) {
            return false;
        }
        
		// Make an extra date check.
		$year = (int) substr($personalIdentityNumber, 0, 4);
		$month = (int) substr($personalIdentityNumber, 4, 2);
		$day = (int) substr($personalIdentityNumber, 6, 2);			
		if(! checkdate($month, $day, $year)) {
			return false;
		}
		$now = time();
		$compareDate = time(0, 0, 0, $month, $day, $year);
		// Something futuristic can't be right.
		if ($compareDate > $now) {
			echo 'compare date';
			return false;
		}
		$personalIdentityNumber = substr($personalIdentityNumber, 2);
		// Check the control digit.
		$controlDigit = (int) substr($personalIdentityNumber, -1, 1);
		if ($controlDigit != self::calculateControlDigit($personalIdentityNumber)) {    
			echo 'control'.$controlDigit;
			return false;
		}
        return true;
    }
    
    /**
     * Calculates the last control digit.
     * </p>
     * @param personalIdentityOrOrganizationNumber
     * @return the control digit.
     */
    private static function calculateControlDigit($personalIdentityOrOrganizationNumber)
    {
        $sum = 0;
        $numberSum = array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $numberToControl = (float) $personalIdentityOrOrganizationNumber;
        for ($i = 1; $i <= 9; $i++) {
            $numberToControl = $numberToControl / 10;
            $digit = (int) ($numberToControl % 10);
            $multiplier = (($i % 2) + 1);
            $digit = $digit * $multiplier;
            $sum = $sum + $numberSum[$digit];
        }
        return ((10 - ($sum % 10)) % 10);
    }

}

?>
