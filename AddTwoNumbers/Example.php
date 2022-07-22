<?php

declare(strict_types=1);

use App\AddTwoNumbers\ListNodeFactory;
use App\AddTwoNumbers\Solution;

require 'Solution.php';

print_r(
    (new Solution())->addTwoNumbers(
        ListNodeFactory::create([9, 9, 9, 9, 9, 9, 9]),
        ListNodeFactory::create([9, 9, 9, 9])
    )
);
