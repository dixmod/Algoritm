<?php

declare(strict_types=1);

namespace App\StrongPasswordChecker;

class Solution
{
    public const MAX_LEN = 20;
    public const MIN_LEN = 6;

    public function strongPasswordChecker(string $password): int
    {
        $lenPassword = strlen($password);
        $error = self::MIN_LEN - $lenPassword;

        if ($error > 0) {
            return $error;
        }

        $dig = [];
        $uCh = [];
        $lCh = [];

        $prevChar = null;
        $repeats = 0;
        $error = 0;

        foreach (str_split($password) as $char) {
            if($prevChar === $char) {
                if ($repeats < 2) {
                    ++$repeats;
                } else {
                    $repeats = 0;
                    $error++;
                }
            } else {
                $repeats = 1;
                $prevChar = $char;
            }

            if (true === is_numeric($char)) {
                $dig[$char] = array_key_exists($char, $dig) ? $dig[$char] + 1 : 1;

                continue;
            }

            if ($char === strtolower($char)) {
                $lCh[$char] = array_key_exists($char, $lCh) ? $lCh[$char] + 1 : 1;
            }

            if ($char === strtoupper($char)) {
                $uCh[$char] = array_key_exists($char, $uCh) ? $uCh[$char] + 1 : 1;
            }
        }

        //        if (0 !== $error) {
        //            return $error;
        //        }

        if(0 === sizeof($dig) || 0 === sizeof($uCh) || 0 === sizeof($lCh)) {
            return $error-1;
        }

        if(0 !== $error) {
            return $error;
        }

        $errorL = $lenPassword - self::MAX_LEN;

        if ($errorL > 0) {
            $error += $errorL;
        }

        return $error;
    }
}

print_r((new Solution())->strongPasswordChecker('aabbaa')); // 5
//print_r( (new Solution)->strongPasswordChecker('a') ); // 5
//print_r( (new Solution)->strongPasswordChecker("aA1") ); // 3
//print_r( (new Solution)->strongPasswordChecker("1337C0d3") ); // 0
//print_r((new Solution)->strongPasswordChecker("aaa123")); // 1
//print_r((new Solution)->strongPasswordChecker("aaa111")); // 1
//print_r((new Solution)->strongPasswordChecker("1111111111")); // 3
//print_r((new Solution)->strongPasswordChecker("bbaaaaaaaaaaaaaaacccccc")); // 8
