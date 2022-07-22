<?php

declare(strict_types=1);

namespace App\KWeakestRows;

class Solution
{
    /**
     * @param Integer[][] $mat
     * @param Integer $k
     * @return Integer[]
     */
    public function kWeakestRows(array $mat, int $k): array
    {
        $strongs = [];

        foreach ($mat as $in => $child) {
            $strongs[$in] = $this->getRowSoldiersCount($child, 0);
        }

        return $strongs;
    }

    private function getRowSoldiersCount(array &$arr, int $lower, int $high): int
    {
        $middle = intval(($lower + $high) / 2);
        if ($middle == 0) {
            return $arr[$middle];
        }

        if ($middle == count($arr) - 1) {
            return count($arr);
        }

        if (1 == $arr[$middle] && 1 == $arr[$middle + 1]) {
            return $this->getRowSoldiersCount($arr, $middle + 1, $high);
        } elseif (0 == $arr[$middle]) {
            return $this->getRowSoldiersCount($arr, $lower, $middle - 1);
        } else {
            return $middle + 1;
        }
    }
}


print_r(new Solution())->kWeakestRows(
    [[1, 1, 0, 0, 0],
        [1, 1, 1, 1, 0],
        [1, 0, 0, 0, 0],
        [1, 1, 0, 0, 0],
        [1, 1, 1, 1, 1]],
    3
);
