<?php

declare(strict_types=1);

namespace App\MaxArea;

class Solution
{
    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function maxArea($heights) {
        $maxArea = 0;
        $countHeights = count($heights);

        for ($index1 = 0; $index1 < $countHeights; $index1++) {
            for ($index2 = $index1 + 1; $index2 < $countHeights; $index2++) {
                $area = ($index2 - $index1) * min($heights[$index1], $heights[$index2]);

                if ($maxArea < $area) {
                    $maxArea = $area;
                }
            }
        }

        return $maxArea;

    }
}
