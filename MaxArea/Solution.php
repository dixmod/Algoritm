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
        $countHeights = sizeof($heights);

        for ($index1 = 0; $index1 < $countHeights; $index1++) {
            for ($index2 = $index1; $index2 < $countHeights; $index2++) {
                $multiplication = $heights[$index2] * abs($index2 - $index1 - 1);

                if ($currentMultiplication < $multiplication) {
                    $currentMultiplication = $multiplication;
                }
            }
        }

        return $currentMultiplication;
    }
}
