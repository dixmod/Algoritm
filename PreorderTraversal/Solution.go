func preorderTraversal(root *TreeNode) []int {
    out := []int{}

    out = get(root, out);

    return out;
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
