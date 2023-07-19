<?php

declare(strict_types=1);

namespace App\CountAndSay;

/**
 * Class Solution
 */
class Solution
{
    /**
     * @param Integer $n
     * @return String
     */
    public function countAndSay(int $n): string
    {
        $s = '1';

        for ($i = 0; $i < $n - 1; $i++) {
            $s = $this->say($s);
        }

        return $s;
    }

    /**
     * @param string $inStr
     * @return string
     */
    public function say(string $inStr): string
    {
        $outStr = '';
        $currentChar = $inStr[0];
        $counter = 1;

        for ($i = 1; $i < strlen($inStr); $i++) {
            if ($currentChar === $inStr[$i]) {
                $counter++;

                continue;
            }

            $outStr .= $counter;
            $outStr .= $currentChar;

            $counter = 1;
            $currentChar = $inStr[$i];
        }


        $outStr .= $counter;
        $outStr .= $currentChar;

        return $outStr;
    }
}
