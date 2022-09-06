<?php

declare(strict_types=1);

namespace App\letterCombinations;

class Solution
{
    private static array $result = [];

    private const DIG = [
        0 => [],
        1 => [],
        2 => ['a', 'b', 'c'],
        3 => ['d', 'e', 'f'],
        4 => ['g', 'h', 'i'],
        5 => ['j', 'k', 'l'],
        6 => ['m', 'n', 'o'],
        7 => ['p', 'q', 'r', 's'],
        8 => ['t', 'u', 'v'],
        9 => ['w', 'x', 'y', 'z'],
    ];

    private static array $digits = [];
    private static int $lenDigits = 0;

    /**
     * @param String $digits
     * @return String[]
     */
    public function letterCombinations(string $digits)
    {
        self::$result = [];
        self::$digits = str_split($digits);
        self::$lenDigits = sizeof(self::$digits);

        self::generate('', 0);

        return self::$result;
    }

    private static function generate(string $current, int $level)
    {
        if (strlen($current) === self::$lenDigits) {
            self::$result[] = $current;

            return;
        }

        foreach (self::DIG[self::$digits[$level]] as $c) {
            self::generate($current . $c, $level + 1);
        }
    }
}
