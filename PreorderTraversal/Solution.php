<?php

declare(strict_types=1);

namespace App\PreorderTraversal;

class Solution
{
    static $out = [];

    /**
     * @return Integer[]
     */
    function preorderTraversal(TreeNode $root): array
    {
        self::get($root);

        return self::$out;
    }

    public static function get(?TreeNode $root): void
    {
        self::$out[] = $root->getVal();

        if (null !== $root->getLeft()) {
            self::get($root->getLeft());
        }

        if (null !== $root->getRight()) {
            self::get($root->getRight());
        }
    }
}

