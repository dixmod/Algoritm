<?php

declare(strict_types=1);

namespace App\PreorderTraversal;

require '../vendor/autoload.php';

$root = Factory::create([1, null, 2, 3]);

var_dump(
    (new Solution())->preorderTraversal($root)
); // 2
