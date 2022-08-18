<?php

declare(strict_types=1);

namespace App\JumpGame2;

require 'vendor/autoload.php';

print_r(
    (new Solution())->jump([2,3,1,1,4])
); // 2
