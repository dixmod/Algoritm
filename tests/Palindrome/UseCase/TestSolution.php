<?php

declare(strict_types=1);

namespace App\Tests\Palindrome\UseCase;

use App\Palindrome\ListNode;
use App\Palindrome\ListNodeFactory;
use App\Palindrome\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\Palindrome\Solution
 */
class TestSolution extends TestCase
{
    private Solution $service;

    protected function setUp(): void
    {
        $this->service = new Solution();
    }

    /**
     * @param ListNode $request
     * @dataProvider dataIsPalindrome
     */
    public function testIsPalindrome(ListNode $headList, bool $expected)
    {
        $result = $this->service->isPalindrome($headList);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataIsPalindrome(): Generator
    {
        yield [
            'request' => ListNodeFactory::create([1, 5, 3, 4, 3, 4, 1, 2, 3, 4, 6, 2,]),
            'expected' => false,
        ];

        yield [
            'request' => ListNodeFactory::create([1, 2, 3, 2, 1,]),
            'expected' => true,
        ];


        yield [
            'request' => ListNodeFactory::create([1, 2, 2, 2, 1]),
            'expected' => true,
        ];

        yield [
            'request' => ListNodeFactory::create([1, 2, 2, 1]),
            'expected' => true,
        ];

        yield [
            'request' => ListNodeFactory::create([1,2,1]),
            'expected' => true,
        ];

        yield [
            'request' => ListNodeFactory::create([1, 1, 2, 1]),
            'expected' => true,
        ];

        yield [
            'request' => ListNodeFactory::create([-1,2,1]),
            'expected' => false,
        ];

        yield [
            'request' => ListNodeFactory::create([1,]),
            'expected' => true,
        ];
    }
}
