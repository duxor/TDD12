<?php

namespace Tests\Feature;

use App\FloatRange;
use App\IntegerRange;
use Tests\TestCase;

/**
 * Class RangeTest
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class RangeTest extends TestCase
{
    /**
     * @author Dusan Perisic
     */
    public function testRange()
    {
        $range = new IntegerRange(4, 15);
        $this->assertTrue($range->isInRange(4));
        $this->assertTrue($range->isInRange(15));
        $this->assertFalse($range->isInRange(3));
        $this->assertFalse($range->isInRange(-4));
        $this->assertFalse($range->isInRange(22));

        $range = new FloatRange(5.44, 8.67);
        $this->assertTrue($range->isInRange(5.44));
        $this->assertTrue($range->isInRange(8.67));
        $this->assertFalse($range->isInRange(8.68));
        $this->assertFalse($range->isInRange(5));
        $this->assertFalse($range->isInRange(55));
    }

    /**
     * @author Dusan Perisic
     */
    public function testIntersection()
    {
        $range_1 = new IntegerRange(4, 15);
        $range_2 = new IntegerRange(12, 22);
        $intersection = $range_1->intersection($range_2);
        $this->assertTrue($intersection->isInRange(12));
        $this->assertTrue($intersection->isInRange(15));
        $this->assertFalse($intersection->isInRange(3));
        $this->assertFalse($intersection->isInRange(-4));
        $this->assertFalse($intersection->isInRange(22));

        $range_1 = new FloatRange(3.55, 4.98);
        $range_2 = new FloatRange(3.9, 4.12);
        $range_3 = new FloatRange(-1.1, 0.12);
        $intersection = $range_1->intersection($range_3);
        $this->assertNull($intersection);
        $intersection = $range_1->intersection($range_2);
        $this->assertTrue($intersection->isInRange(3.9));
        $this->assertTrue($intersection->isInRange(4.12));
        $this->assertTrue($intersection->isInRange(4.11999));
        $this->assertFalse($intersection->isInRange(3.89999));
        $this->assertFalse($intersection->isInRange(4.12000001));
        $this->assertFalse($intersection->isInRange(-123));
    }
}
