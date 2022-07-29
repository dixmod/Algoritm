package main

import (
)

func isMonotonic(nums []int) bool {
    var isStart bool = true
	var dynamicOld int
	var dynamic int

	for index := 0; index < len(nums)-1; index++ {
		dynamic = nums[index + 1] - nums[index]

		if(0 == dynamic){
			continue
		}

		dynamic = dynamic / abs(dynamic)

		if dynamic != dynamicOld && false == isStart {
			return false
		}

		dynamicOld = dynamic
        isStart = false
	}

	return true
}

func abs(x int) int {
        if x < 0 {
                return -x
        }
        return x
}

func main() {
	println(isMonotonic([]int{1,2,1}))
}


