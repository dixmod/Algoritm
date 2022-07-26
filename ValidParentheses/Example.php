<?php

declare(strict_types=1);

namespace App\ValidParentheses;

require 'vendor/autoload.php';
print_r(
    (new Solution())->isValid('()')
);
