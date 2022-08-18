/**
 * @param {number[]} nums
 * @return {number}
 */
var jump = function (nums) {
    var currentIndexPoint = 0;
    var maxJump = 0;
    var countJumps = 0;
    var countPoints = nums.length - 1;

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
