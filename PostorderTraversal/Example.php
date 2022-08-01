<?php

declare(strict_types=1);

namespace App\PostorderTraversal;

require 'vendor/autoload.php';

$root = Factory::create([3,1,2]);

print_r($root);
print_r(
    (new Solution())->preorderTraversal($root)
); // 2
