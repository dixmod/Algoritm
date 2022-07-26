<?php

declare(strict_types=1);

namespace App\GenerateParentheses;

require 'vendor/autoload.php';

print_r(
    (new Solution())->generateParenthesis(2)
);
