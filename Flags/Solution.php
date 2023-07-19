<?php

declare(strict_types=1);

namespace App\Flags;

class Solution
{
    /**
     * @var int[]
     */
    private array $pics;

    /**
     * @param int[] $heights
     */
    public function getMaxCountFlags(array $heights): int
    {
        $this->pics = $this->getPics($heights);
        $lengths = $this->getLengths($this->pics);

        $picsForFlag = $this->findPicsForFlag($lengths);

        return count($picsForFlag);
    }

    /**
     * @param array<int> $heights
     * @return array<int, bool>
     */
    private function getPics(array $heights): array
    {
        $lastIndexPic = count($heights) - 1;
        $pics = [
            0 => true,
            $lastIndexPic => true
        ];

        for ($indexPoint = 1; $indexPoint <= $lastIndexPic; $indexPoint++) {
            if (true === $this->isPic($heights, $indexPoint)) {
                unset($pics[$indexPoint - 1], $pics[$indexPoint + 1]);

                $pics[$indexPoint] = true;
            }
        }

        return array_keys($pics);
    }

    private function isPic($heights, $indexPoint): bool
    {
        return $heights[$indexPoint - 1] < $heights[$indexPoint] &&
            $heights[$indexPoint] > $heights[$indexPoint + 1];
    }

    private function findPicsForFlag(array $lengths): array
    {
        $countPics = count($lengths);

        for ($countFlags = $countPics; $countFlags > 1; $countFlags--) {
            $picsForFlags = [];

            foreach ($lengths as $indexPic => $length) {
                if (count($picsForFlags) == 0) {
                    $picsForFlags[$indexPic] = true;

                    continue;
                }


                //                if (
                //                    $length['prev'] >= $countFlags &&
                //                    $length['next'] >= $countFlags
                //                ) {
                //                    $picsForFlags[$indexPic] = true;
                //                }
            }

            if (count($picsForFlags) === $countFlags) {
                break;
            }
        }

        return $picsForFlags;
    }

    private function getLengths(array $pics): array
    {
        $lengths = [];
        $countPics = count($this->pics);

        foreach ($pics as $index => $pic) {
            $lengths[$pic] = [
                'prev' => abs(($pics[$index - 1] ?? 0) - $pic),
                'next' => abs(($pics[$index + 1] ?? $countPics) - $pic),
            ];
        }

        return $lengths;
    }
}
