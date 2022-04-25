<?php

class SolutionsFlags
{
    public const A = [
        1, 5, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2,
//        1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
//        1, 2, 1, 1, 1, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1
//        1, 2, 1, 1, 1, 1, 2, 1, 1, 1, 1, 2, 1, 1, 1, 1, 2, 1, 1, 1, 1, 2, 1
    ];

    /**
     * @param string[] $heights
     *
     */
    public function solution(array $heights): void
    {
        $pics = $this->getPics($heights);
        $lengths = $this->getLengths($pics);
        print_r($pics);

        $picsForFlag = $this->findPicsForFlag($lengths);

//        print_r($picsForFlag);
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
                if (count($picsForFlags) == 0){
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

        foreach ($pics as $index => $pic) {
            $lengths[$pic] = [
                'prev' => abs(($pics[$index - 1] ?? 0) - $pic),
                'next' => abs(($pics[$index + 1] ?? count(SolutionsFlags::A)) - $pic),
            ];
        }

        return $lengths;
    }
}

(new SolutionsFlags())->solution(SolutionsFlags::A);
