<?php

declare(strict_types=1);

namespace App\IntegerToRoman;

class Solution
{
    public const MAP_DIGIT = [
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
        'I' => 1,
    ];

    /**
     * @param integer $num
     * @return string
     */
    public function intToRoman(int $num): string
    {
        $str = '';

        foreach (self::MAP_DIGIT as $symbol => $digit) {
            $countDigit = intdiv($num, $digit);

            $num -= $countDigit * $digit;

            $str .= str_repeat($symbol, $countDigit);
        }

        return $str;
    }
}
