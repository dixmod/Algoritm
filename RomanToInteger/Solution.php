<?php

declare(strict_types=1);

namespace App\RomanToInteger;

class Solution
{
    public const MAP_DIGIT = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    /**
     * @var array<string, int>
     */
    private array $priorities;

    public function __construct()
    {
        $this->priorities = $this->getPriorities();
    }

    /**
     * @param string $str
     * @return integer
     */
    public function romanToInt(string $str): int
    {
        $num = 0;
        $str = str_split($str);

        for ($index = 0; $index <= count($str) - 1; $index++) {
            $char = $str[$index];

            $digit = $this->charToDigit($char);
            $operation = $this->getOperation($char, $str[$index + 1] ?? null);

            $num += $operation * $digit;
        }

        return $num;
    }

    /**
     * @param string $char
     * @return int
     */
    private function charToDigit(string $char): int
    {
        return self::MAP_DIGIT[$char];
    }

    /**
     * @return array<string, int>
     */
    private function getPriorities(): array
    {
        return array_flip(array_keys(self::MAP_DIGIT));
    }

    private function getOperation(string $char, ?string $prevChar): int
    {
        if (null === $prevChar) {
            return 1;
        }

        $deltaPriority = $this->priorities[$prevChar] - $this->priorities[$char];

        if ($deltaPriority >= 1) {
            return -1;
        }

        return 1;
    }
}
