<?php

declare(strict_types=1);

namespace App\LetterCombinations;

require 'vendor/autoload.php';

print_r(
    (new Solution())->letterCombinations('234')
);
