<?php

declare(strict_types=1);

namespace App\isMonotonic;

require 'vendor/autoload.php';

print_r(
    (new Solution())->isMonotonic([1,2,2,1])
);
