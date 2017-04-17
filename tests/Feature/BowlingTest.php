<?php

namespace Tests\Feature;

use App\Bowling;
use Tests\TestCase;

/**
 * Class BowlingTest
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class BowlingTest extends TestCase
{
    /**
     * @author Dusan Perisic
     */
    public function testBowlingScore()
    {
        $bowling = new Bowling();

        $this->assertEquals(300, $bowling->getScore("X|X|X|X|X|X|X|X|X|X||XX"));
        $this->assertEquals(90, $bowling->getScore("9-|9-|9-|9-|9-|9-|9-|9-|9-|9-||"));
        $this->assertEquals(150, $bowling->getScore("5/|5/|5/|5/|5/|5/|5/|5/|5/|5/||5"));
        $this->assertEquals(56, $bowling->getScore("5-|8-|2-|6-|1-|6-|7-|41|52|9-||"));
        $this->assertEquals(61, $bowling->getScore("5-|8-|2-|6/|1-|6-|7-|41|52|9-||"));
        $this->assertEquals(74, $bowling->getScore("5/|8-|2-|6/|1-|6-|7-|41|52|9-||"));
    }
}
