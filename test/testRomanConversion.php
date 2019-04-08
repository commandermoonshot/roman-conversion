<?php
/**
 * Created by PhpStorm.
 * User: richard.chrenek
 * Date: 2019-04-08
 * Time: 07:39
 */

namespace RomanConverter;

use PHPUnit\Framework\TestCase;

class testRomanConversion extends TestCase
{
    public function testIntToRomanReturnsArray()
    {
        $this->assertTrue(is_array(RomanConversion::intToRoman(800, false)));
    }

    public function testIntToRomanWithoutVinculumReturnsOneValueInArray()
    {
        $this->assertArrayHasKey(0, RomanConversion::intToRoman(900, false));
    }

    public function testIntToRomanWithVinculumReturnsTwoValuesInArray()
    {
        $this->assertArrayHasKey(0, RomanConversion::intToRoman(1900, true));
        $this->assertArrayHasKey(1, RomanConversion::intToRoman(1900, true));
    }

    public function testIntToRomanReturnsBlankStringWhenZeroOrNegative()
    {
        $this->assertEquals("", RomanConversion::intToRoman(-1)[0]);
        $this->assertEquals("", RomanConversion::intToRoman(0)[0]);
    }

}