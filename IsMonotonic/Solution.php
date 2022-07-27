<?php

declare(strict_types=1);

namespace App\IsMonotonic;

class Solution
{
    /**
     * @param int[] $nums
     */
    function isMonotonic(array $nums): bool
    {
        $dinamicOld = null;

        for ($index = 0; $index < sizeof($nums)-1; $index++) {
            $dinamic = $nums[$index + 1] - $nums[$index];

            if (0 === $dinamic) {
                continue;
            }

            $dinamic = $dinamic / abs($dinamic);

            if ($dinamic !== $dinamicOld && null !== $dinamicOld) {
                return false;
            }

            $dinamicOld = $dinamic;
        }

        return true;
    }
}

