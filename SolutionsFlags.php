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
        $pics = $this->setLengths($pics);
        print_r($pics);

        $pics = $this->findPicsForFlag($pics);

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

        return $pics;
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

    private function findPicsForFlag(array $pics): array
    {
        $countPics = count($pics);

        for ($countFlags = $countPics; $countFlags >= 1; $countFlags--) {
            $picsForFlags = [];

            foreach ($pics as $indexPic => $length) {
                if ($length <= $countFlags) {
                    $picsForFlags[$indexPic] = true;
                }
            }

            if (count($picsForFlags) == $countFlags) {
                break;
            }
        }

        return $picsForFlags;
    }

    private function setLengths(array $pics)
    {
        $prevIndex = 0;
        foreach ($pics as $index => $pic) {
            $pics[$index] = $index - $prevIndex;
            $prevIndex = $index;
        }

        return $pics;
    }
}

(new SolutionsFlags())->solution(SolutionsFlags::A);