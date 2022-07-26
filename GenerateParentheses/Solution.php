<?php

declare(strict_types=1);

namespace App\GenerateParentheses;

class Solution
{
    private static array $result;

    /**
     * @return string[]
     */
    function generateParenthesis(int $n): array
    {
        static::$result = [];

        self::generate($n, '', 0, 0);

        return static::$result;
    }

    static private function generate(int $n, string $current, int $open, int $close): void
    {
        if ($open < $n) {
            self::generate($n, $current . '(', $open + 1, $close);
        }

        if ($close < $open) {
            self::generate($n, $current . ')', $open, $close + 1);
        }

        if ($n * 2 == strlen($current)) {
            self::$result[] = $current;
        }
    }
}

