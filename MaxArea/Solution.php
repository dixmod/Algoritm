<?php

declare(strict_types=1);

namespace App\MaxArea;

class Solution
{
    /**
     * @param Integer[] $heights
     * @return Integer
     */
    public function maxArea($heights)
    {
        $maxArea = 0;
        $index1 = 0;
        $index2 = sizeof($heights) - 1;

        while ($index1 < $index2) {
            $width = $index2 - $index1;

            if ($heights[$index1] < $heights[$index2]) {
                $height = $heights[$index1];
                ++$index1;
            } else {
                $height = $heights[$index2];
                --$index2;
            }

            $area = $width * $height;

            if ($maxArea < $area) {
                $maxArea = $area;
            }
        }

        return $maxArea;
    }
}
