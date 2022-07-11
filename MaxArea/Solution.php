<?php

declare(strict_types=1);

namespace App\MaxArea;

class Solution
{
    /**
     * @param Integer[] $heights
     * @return Integer
     */
    public function maxArea(array $heights): int
    {
        $currentMultiplication = 0;
        $countHeights = count($heights);

        for ($index1 = 0; $index1 < $countHeights; $index1++) {
            for ($index2 = $index1 + 1; $index2 < $countHeights; $index2++) {

                $multiplication = $heights[$index2] * ($index2 - $index1 - 1);

                if ($currentMultiplication < $multiplication) {
                    $currentMultiplication = $multiplication;
                }
            }
        }

        return $currentMultiplication;
    }
}

print_r((new Solution())->maxArea([1, 8, 6, 2, 5, 4, 8, 3, 7]));