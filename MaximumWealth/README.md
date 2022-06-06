# Task

У Вас есть список счетов (accounts) в виде сетки m x n, где счета account[i] [j] - это сумма денег, которую имеет i й клиент в j м  банк.

Верните богатство, которое есть у самого богатого клиента.

Богатство клиента — это сумма денег, которую он имеет на всех своих банковских счетах.
Самый богатый клиент — это клиент, который имеет максимальное богатство.

Example 1:
Input: accounts = [[1,2,3],[3,2,1]]
Output: 6
Explanation:
1й клиент имеет = 1 + 2 + 3 = 6
2й клиент имеет = 3 + 2 + 1 = 6
Оба клинта имеют на счетах по 6 и это самое большое значение, ответ 6

Example 2:
Input: accounts = [[1,5],[7,3],[3,5]]
Output: 10
Explanation:
1st customer has wealth = 6
2nd customer has wealth = 10
3rd customer has wealth = 8
The 2nd customer is the richest with a wealth of 10.
Example 3:
Input: accounts = [[2,8,7],[7,1,3],[1,9,5]]
Output: 17

# Test
```
phpunit ./tests/MaximumWealth/UseCase/TestSolution.php  --bootstrap vendor/autoload.php
