/**
 * @param {number[]} nums
 * @return {number}
 */
var jump = function (nums) {
    let currentIndexPoint = 0;
    let maxJump = 0;
    let countJumps = 0;
    let countPoints = nums.length - 1;

    for (indexPoint = 0; currentIndexPoint < countPoints; ++indexPoint) {
        nextPointAfterJump = indexPoint + nums[indexPoint];

        if (maxJump < nextPointAfterJump) {
            maxJump = nextPointAfterJump;
        }

        if (indexPoint === currentIndexPoint) {
            currentIndexPoint = maxJump;
            ++countJumps;
        }
    }

    return countJumps;
};
