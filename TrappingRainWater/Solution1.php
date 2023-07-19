<?php

declare(strict_types=1);

namespace App\TrappingRainWater;

/**
 * @see https://leetcode.com/problems/trapping-rain-water/
 */
class Solution1
{
    /** @var int[] */
    protected array $heights;
    protected int $countHeights;

    /**
     * @param int[] $heights
     * @return int
     */
    public function trap(array $heights): int
    {
        $capacity = 0;
        $this->heights = $heights;
        $this->countHeights = count($heights) - 1;

        for ($levelWater = min($heights); $levelWater < max($heights); $levelWater++) {
            $picLeft = $this->getPicLeft($levelWater);
            $picRight = $this->getPicRight($levelWater);

            for ($index = $picLeft + 1; $index <= $picRight - 1; $index++) {
                if ($heights[$index] - $levelWater <= 0) {
                    ++$capacity;
                }
            }
        }

        return $capacity;
    }

    private function getPicRight(int $levelWater): int
    {
        for ($index = $this->countHeights; $index > 0; $index--) {
            if ($this->isPic($index, $levelWater)) {
                return $index;
            }
        }

        return $this->countHeights;
    }

    private function getPicLeft(int $levelWater): int
    {
        for ($index = 0; $index <= $this->countHeights; $index++) {
            if ($this->isPic($index, $levelWater)) {
                return $index;
            }
        }

        return 0;
    }

    private function isPic(int $index, int $levelWater): bool
    {
        return $this->heights[$index] - $levelWater > 0;
    }
}

echo (new Solution1())->trap([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]);
echo PHP_EOL;
echo (new Solution1())->trap([4, 2, 0, 3, 2, 5]);
