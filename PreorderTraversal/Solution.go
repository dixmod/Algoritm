func preorderTraversal(root *TreeNode) []int {
    return get(root, []int{});
}

func get(root *TreeNode, out []int) []int{
    if nil == root {
        return out;
    }

    out = append(out, root.Val)

    if nil != root.Left {
        out = get(root.Left, out)
    }

    if nil != root.Right {
        out = get(root.Right, out)
    }

    return out;
}
