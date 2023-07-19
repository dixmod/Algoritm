<?php

declare(strict_types=1);

namespace App\TrappingRainWater;

/**
 * @see https://leetcode.com/problems/trapping-rain-water/
 */
class Solution
{
    /**
     * @param int[] $heights
     * @return int
     */
    public function trap(array $heights): int
    {
        $countHeights = count($heights) - 1;
        $capacity = 0;
        $leftLimit = [$heights[0]];
        $rightLimit[$countHeights] = $heights[$countHeights];

        for ($leftIndex = 1; $leftIndex <= $countHeights; $leftIndex++) {
            $leftLimit[$leftIndex] = $this->getHighLimit($leftLimit[$leftIndex - 1], $heights[$leftIndex]);

            $rightIndex = $countHeights - $leftIndex;
            $rightLimit[$rightIndex] = $this->getHighLimit($rightLimit[$rightIndex + 1], $heights[$rightIndex]);
        }

        for ($index = 1; $index <= $countHeights; $index++) {
            $capacity += $this->getLowLimit($leftLimit[$index], $rightLimit[$index]) - $heights[$index];
        }

        return $capacity;
    }

    private function getHighLimit(int $left, int $right): int
    {
        if ($left > $right) {
            return $left;
        }

        return $right;
    }

    private function getLowLimit(int $left, int $right): int
    {
        if ($left < $right) {
            return $left;
        }

        return $right;
    }
}

echo (new Solution())->trap([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]);
//echo PHP_EOL;
//echo (new Solution())->trap([4, 2, 0, 3, 2, 5]);
