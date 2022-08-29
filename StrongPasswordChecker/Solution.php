<?php

declare(strict_types=1);

namespace App\StrongPasswordChecker;

class Solution {

    const MAX_LEN = 20;
    const MIN_LEN = 6;

    function strongPasswordChecker(string $password): int
    {
        $lenPassword = strlen($password);
        $errorLen = $lenPassword - self::MIN_LEN - 1;

        if ($errorLen <= 0) {
            return -++$errorLen;
        }

        $errorLen = self::MAX_LEN - $lenPassword - 1;

        if ($errorLen <= 0) {
            return -$errorLen;
        }

        $dig = [];
        $uCh = [];
        $lCh = [];

        foreach (str_split($password) as $char) {
            if (true === is_numeric($char)) {
                $dig[$char] = ++$dig[$char] ?? 1;

                continue;
            }

            if ($char === strtoupper($char)) {
                $uCh[$char] = ++$uCh[$char] ?? 1;

                continue;
            }

            $lCh[$char] = ++$lCh[$char] ?? 1;
        }

        return $lenPassword - sizeof($dig) - sizeof($uCh) - sizeof($lCh);
    }
}


//print_r( (new Solution)->strongPasswordChecker('a') ); // 5
//print_r( (new Solution)->strongPasswordChecker("aA1") ); // 3
//print_r( (new Solution)->strongPasswordChecker("1337C0d3") ); // 0
