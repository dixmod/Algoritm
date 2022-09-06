<?php

declare(strict_types=1);

namespace App\PostorderTraversal;

class Solution
{
    private static $out = [];

    /**
     * @return Integer[]
     */
    public function preorderTraversal(?TreeNode $root): array
    {
        self::$out = [];

        self::get($root);

        return self::$out;
    }

    public static function get(?TreeNode $root): void
    {
        if (null === $root) {
            return ;
        }

        if (null !== $root->left) {
            self::get($root->left);
        }

        if (null !== $root->right) {
            self::get($root->right);
        }

        self::$out[] = &$root->val;
    }
}
