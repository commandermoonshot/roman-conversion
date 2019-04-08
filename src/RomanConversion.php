<?php
/**
 * Created by PhpStorm.
 * User: richard.chrenek
 * Date: 2019-04-08
 * Time: 07:02
 */

namespace RomanConverter;

class RomanConversion
{
    const NUMERALS = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    /**
     * Converts integer to Roman numeral, and returns it as array. If parameter useVinculum is set to true, returns
     * an array containing multiplied and base part. For more info about use of Vinculum in Roman Numerals see:
     * https://en.wikipedia.org/wiki/Roman_numerals#Vinculum
     *
     * @param int $number
     * @param bool $useVinculum
     * @return array
     */
    public static function intToRoman(int $number, bool $useVinculum = false): array
    {
        $result = [];

        if ($useVinculum) {
            $result[] = self::convertToRoman($number, true);
            $result[] = self::convertToRoman($number % 1000);
        } else {
            $result[] = self::convertToRoman($number);
        }

        var_dump($result);
        return $result;
    }

    /**
     * Converts specified number into string of Roman numerals. Uses customized version of algorithm from:
     * https://www.php.net/manual/en/function.base-convert.php
     *
     * @param int $number
     * @param bool $useVinculum
     * @return string
     */

    private static function convertToRoman(int $number, bool $useVinculum = false)
    {

        $result = "";

        while ($number > ($useVinculum ? 1000 : 0)) {
            foreach (self::NUMERALS as $roman => $int) {
                if ($number >= ($useVinculum ? $int * 1000 : $int)) {
                    $number -= ($useVinculum ? $int * 1000 : $int);
                    $result .= $roman;
                    break;
                }
            }
        }
        return $result;
    }
}