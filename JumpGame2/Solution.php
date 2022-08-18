<?php

declare(strict_types=1);

namespace App\JumpGame2;

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump(array $nums): int
    {
        $currentIndexPoint = 0;
        $maxJump = 0;
        $countJumps = 0;
        $countPoints = sizeof($nums) - 1;

        for ($indexPoint = 0; $currentIndexPoint < $countPoints; ++$indexPoint) {
            $nextPointAfterJump = $indexPoint + $nums[$indexPoint];

            if ($maxJump < $nextPointAfterJump) {
                $maxJump = $nextPointAfterJump;
            }

            if ($indexPoint === $currentIndexPoint) {
                $currentIndexPoint = $maxJump;
                ++$countJumps;
            }
        }

        return $countJumps;
    }
}
