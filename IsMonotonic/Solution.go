package main

import (
)

func isMonotonic(nums []int) bool {
	var dinamicOld int = 99999
	var dinamic int

	for index := 0; index < len(nums)-1; index++ {
		dinamic = nums[index + 1] - nums[index]

		if(0 == dinamic){
			continue
		}

		dinamic = dinamic / abs(dinamic)

		if dinamic != dinamicOld && 99999 != dinamicOld {
			return false
		}

		dinamicOld = dinamic
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


