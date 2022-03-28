<?php

class SolutionsFlags
{
    public const A = [1, 5, 3, 5, 4, 3, 7, 3, 5, 2, 7, 10, 9, 7, 8, 1, 3, 2, 7, 3, 7, 9, 4, 3, 5, 1, 4, 2];

    function solution($A)
    {
        $peaks = [];
        for ($i = 0; $i < count($A) - 1; $i++) {
            if ($A[$i] > $A[$i + 1]) {
                $peaks[] = array(
                    'key' => $i
                );
            }
        }
        for ($i = 0; $i < count($peaks) - 1; $i++) {
            $peaks[$i]['next'] = abs($peaks[$i]['key'] - $peaks[$i + 1]['key']);
        }
        $i = count($peaks);
        $help = $i;
        while ($i > 0) {
            $space = $help - $i;
            $peakCounter = 0;
            $copyPeaks = $peaks;
            while ($peakCounter < $help - 2 && $space > 0) {
                if ($copyPeaks[$peakCounter]['next'] < $i) {
                    $copyPeaks[$peakCounter]['next'] += $copyPeaks[$peakCounter + 1]['next'];
                    unset($copyPeaks[$peakCounter + 1]);
                    sort($copyPeaks);
                    $space--;
                }
                $peakCounter++;
            }
            if ($space > 0) {
                return $i + 1;
            }
            $i--;
        }
        return 0;
    }
}

echo (new SolutionsFlags())->solution(SolutionsFlags::A);