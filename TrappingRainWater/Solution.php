<?php

declare(strict_types=1);

namespace App\TrappingRainWater;

/**
 * @see https://leetcode.com/problems/trapping-rain-water/
 */
class Solution
{
    protected int $countHeights;
    protected int $maxHeights;
    /** @var int[]  */
    protected array $heights;

    /**
     * @param int[] $heights
     * @return int
     */
    public function trap(array $heights): int
    {
        $capacity = 0;
        $this->heights = $heights;
        $this->countHeights = count($heights) - 1;
        $this->maxHeights = max($heights);

        for ($levelWater = 0; $levelWater < $this->maxHeights; $levelWater++) {
            for ($index = $this->getPicLeft($levelWater) + 1; $index <= $this->getPicRight($levelWater)-1; $index++) {
                if ($heights[$index] - $levelWater <= 0) {
                    ++$capacity;
                }
            }
        }

        return $capacity;
    }

    private function getPicRight(int $levelWater): int
    {
        for ($index = $this->countHeights; $index >= 0; $index--) {
            if ($this->heights[$index] - $levelWater > 0) {
                return $index;
            }
        }

        return $this->countHeights;
    }

    private function getPicLeft(int $levelWater): int
    {
        for ($index = 0; $index <= $this->countHeights; $index++) {
            if ($this->heights[$index] - $levelWater > 0) {
                return $index;
            }
        }

        return 0;
    }
}

echo (new Solution())->trap([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]);
//echo (new Solution())->trap([4, 2, 0, 3, 2, 5]);
