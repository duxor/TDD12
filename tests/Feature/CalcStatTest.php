<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\CalcStat as TestClass;

/**
 * Class CalcStat
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class CalcStatTest extends TestCase
{
    use WithoutMiddleware;
    /**
     * A basic test exNo tests executed!
    ample.
     *
     * @return void
     */
    public function testMinValue()
    {
        $range = new TestClass([55, 66, 77, 1, 654, 8]);
        $this->assertEquals(1, $range->minValue());
    }

    /**
     * @author Dusan Perisic
     */
    public function testMaxValue()
    {
        $range = new TestClass([55, 66, 77, 1, 654, 8]);
        $this->assertEquals(654, $range->maxValue());
    }

    /**
     * @author Dusan Perisic
     */
    public function testCount()
    {
        $range = new TestClass([55, 66, 77, 1, 654, 8]);
        $this->assertEquals(6, $range->count());
    }

    /**
     * @author Dusan Perisic
     */
    public function testAverage()
    {
        $range = new TestClass([55, 66, 77, 1, 654, 8]);
        $this->assertEquals(143.5, $range->averageValue());
    }
}
