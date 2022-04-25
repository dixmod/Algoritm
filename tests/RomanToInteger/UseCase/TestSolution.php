<?php

use App\RomanToInteger\Solution;
use PHPUnit\Framework\TestCase;

class TestSolution extends TestCase
{
    private Solution $service;

    protected function setUp(): void
    {
        $this->service = new Solution();
    }

    /**
     * @dataProvider dataGetValue
     */
    public function testPushAndPop(string $request, int $expected)
    {
        $result = $this->service->romanToInt($request);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataGetValue(): Generator
    {
        yield [
            'request' => 'III',
            'expected' => 3,
        ];

        yield [
            'request' => 'LVIII',
            'expected' => 58,
        ];

        yield [
            'request' => 'MCMXCIV',
            'expected' => 1994,
        ];
    }
}
