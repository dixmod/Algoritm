<?php

declare(strict_types=1);

namespace App\Tests\RomanToInteger\UseCase;

use App\RomanToInteger\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

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

        yield [
            'request' => 'I',
            'expected' => 1,
        ];

        yield [
            'request' => 'IV',
            'expected' => 4,
        ];

        yield [
            'request' => 'CM',
            'expected' => 900,
        ];

        yield [
            'request' => 'XC',
            'expected' => 90,
        ];

        yield [
            'request' => 'XXVII',
            'expected' => 27,
        ];
    }
}
