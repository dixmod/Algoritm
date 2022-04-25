# Use
```
$solution = new Solution();

echo 'III = ' . $solution->romanToInt('III') . PHP_EOL;
echo 'LVIII = ' . $solution->romanToInt('LVIII') . PHP_EOL;
echo 'MCMXCIV = ' . $solution->romanToInt('MCMXCIV') . PHP_EOL;
```

# Test
```
phpunit ./tests/RomanToInteger/UseCase/TestSolution.php  --bootstrap vendor/autoload.php
