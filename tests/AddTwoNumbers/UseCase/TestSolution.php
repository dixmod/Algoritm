<?php

declare(strict_types=1);

namespace App\Tests\AddTwoNumbers\UseCase;

use App\AddTwoNumbers\ListNode;
use App\AddTwoNumbers\ListNodeFactory;
use App\AddTwoNumbers\Solution;
use PHPUnit\Framework\TestCase;
use Generator;

/**
 * @coversDefaultClass App\AddTwoNumbers\Solution
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
    public function testIsPalindrome(ListNode $headList1, ListNode $headLis2, int $expected)
    {
        $result = $this->service->addTwoNumbers($headList1, $headLis2);

        self::assertEquals($expected, $result);
    }

    /**
     * @return Generator<array<string, mixed>>
     */
    public function dataIsPalindrome(): Generator
    {
        yield [
            'node1' => ListNodeFactory::create([2,4,3,]),
            'node2' => ListNodeFactory::create([5,6,4,]),
            'expected' => 807,
        ];

//        yield [
//            'node1' => ListNodeFactory::create([9,9,9,9,9,9,9]),
//            'node2' => ListNodeFactory::create([5,6,4,]),
//            'expected' => 807,
//        ];
    }
}
