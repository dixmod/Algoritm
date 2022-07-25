<?php

declare(strict_types=1);

namespace App\PreorderTraversal;

require '../vendor/autoload.php';

$root = Factory::create([]);
//print_r($root); exit;
var_dump(
    (new Solution())->preorderTraversal($root)
); // 2
