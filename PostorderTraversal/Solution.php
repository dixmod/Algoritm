<?php

declare(strict_types=1);

namespace App\PostorderTraversal;

class Solution
{
    public static $out = [];

    /**
     * @return Integer[]
     */
    public function postorderTraversal(?TreeNode $root): array
    {
        $out = [];
        $parent = [];

        while (null !== $root) {
            $out[] = $root->val;

            if (null !== $root->left) {
                $parent[] = $root;
                $root = $root->left;

                continue;
            }

            if (null !== $root->right) {
                $parent[] = $root;
                $root = $root->right;

                continue;
            }

            $root = array_pop($parent);

            if (null !== $root->right) {
                $parent[] = $root;
            }
        }

        return $out;
    }
}
