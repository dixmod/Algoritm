func postorderTraversal(root *TreeNode) []int {
    return get(root, []int{});
}

func get(root *TreeNode, out []int) []int {
    if nil == root {
        return out;
    }


    if nil != root.Left {
        out = get(root.Left, out)
    }

    if nil != root.Right {
        out = get(root.Right, out)
    }

    return append(out, root.Val);
}
