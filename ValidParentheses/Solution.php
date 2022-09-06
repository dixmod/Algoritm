<?php

declare(strict_types=1);

namespace App\ValidParentheses;

class Solution
{
    private const DIC = [
        '(' => ')',
        '[' => ']',
        '{' => '}',
    ];

    /**
     * @var string[]
     */
    private array $stack = [];

    public function isValid(string $s): bool
    {
        foreach (str_split($s) as $c) {
            if (true === $this->isOpen($c)) {
                $this->addNeed($c);
            } else {
                if (false === $this->isNeed($c)) {
                    return false;
                }
            }
        }

        return 0 === sizeof($this->stack);
    }

    private function isOpen(string $c): bool
    {
        return true === isset(self::DIC[$c]);
    }

    private function addNeed(string $c)
    {
        $this->stack[] = self::DIC[$c];
    }

    private function isNeed(mixed $c): bool
    {
        return $c === array_pop($this->stack);
    }
}
