<?php

declare(strict_types=1);

namespace App\PostorderTraversal;

class TreeNode
{
    public ?int $val = null;
    public ?TreeNode $left = null;
    public ?TreeNode $right = null;

    public function __construct(?int $value = null)
    {
        $this->val = $value;
    }

    public function setLeft(?TreeNode $left): self
    {
        $this->left = $left;

        return $this;
    }

    public function setRight(?TreeNode $right): self
    {
        $this->right = $right;

        return $this;
    }
}
