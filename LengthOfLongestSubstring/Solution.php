<?php

declare(strict_types=1);

namespace App\LengthOfLongestSubstring;

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring(string $s): int
    {
        $maxLength = 0;
        $length = 0;
        $hash = [];

        for ($i = 0; $i < strlen($s); $i++) {
            if (1 == isset($hash[$s[$i]])) {
                if ($maxLength < $length) {
                    $maxLength = $length;
                }

                $hash = [
                    $s[$i] => 1
                ];
                $length = 1;

                continue;
            }

            ++$length;
            $hash[$s[$i]] = 1;
        }

        if ($maxLength < $length) {
            $maxLength = $length;
        }

        return $maxLength;
    }
}
