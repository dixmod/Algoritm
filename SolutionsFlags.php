<?php

class SolutionsFlags
{
    public const A = [1, 5, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2];

    /**
     * @param string[] $heights
     *
     */
    public function solution(array $heights): void
    {
        $pics = $this->getPics($heights);
        $lengths = $this->getLengths($pics);

        $pics = $this->findPicsForFlag($pics, $lengths);

        print_r($pics);
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

                $pics[$indexPoint] = $this->canSetFlag();
            }
        }

        return array_keys($pics);
    }

    private function isPic($heights, $indexPoint): bool
    {
        return $heights[$indexPoint - 1] < $heights[$indexPoint] &&
            $heights[$indexPoint] > $heights[$indexPoint + 1];
    }

    private function canSetFlag(): bool
    {
        return false;
    }

    private function findPicsForFlag(array $pics, array $lengths): array
    {
        $countPics = count($lengths);

        for ($countFlags = $countPics; $countFlags > 1; $countFlags--) {
            $picsForFlags = [];

            foreach ($lengths as $indexPic => $length) {
                if (
                    $length['prev'] <= $countFlags &&
                    $length['next'] <= $countFlags
                ) {
                    $picsForFlags[$indexPic] = true;
                }
            }

            if (count($picsForFlags) == $countFlags) {
                break;
            }
        }

        return $picsForFlags;
    }

    private function getLengths(array $pics): array
    {
        $lengths = [];

        foreach ($pics as $index=>$pic) {
            $lengths[$pic] = [
                'prev' => abs(($pics[$index-1] ?? 0) - $pic),
                'next' => abs(($pics[$index+1] ?? 0) - $pic),
            ];
        }

        return $lengths;
    }
}

(new SolutionsFlags())->solution(SolutionsFlags::A);