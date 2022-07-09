<?php

declare(strict_types=1);

namespace App\Tree;

class Getter
{
    public static function get(?TreeNode $root): void
    {
        if (null !== $root) {
            echo $root->getVal();

            self::get($root->getLeft());
            self::get($root->getRight());
        }
    }
}
