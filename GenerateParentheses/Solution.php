<?php

declare(strict_types=1);

namespace App\GenerateParentheses;

class Solution
{
    private $result = [];

    /**
     * @return string[]
     */
    function generateParenthesis(int $n): array
    {
        $this->generate($n);

        return $this->result;
    }

    private function generate($n, string $current = '', $open = 0, $close = 0): void
    {
        if ($n * 2 == strlen($current)) {
            $this->result[] = $current;

            return;
        }

        if ($open < $n) {
            $this->generate($n, $current . '(', $open + 1, $close);
        }

        if ($close < $open) {
            $this->generate($n, $current . ')', $open, $close + 1);
        }
    }
}

