<?php

namespace Tests\Feature;

use App\MontyHall;
use App\MontyHallStrategy;
use Tests\TestCase;

/**
 * Class MontyHallTest
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class MontyHallTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPlayerOpenFirst()
    {
        $game = new MontyHall();
        $playerFirstStep = $game->playerFirstOpen(rand(0,2));
        $this->assertTrue(is_string($playerFirstStep));
    }

    /**
     * @author Dusan Perisic
     */
    public function testHostOpenDor()
    {
        $game = new MontyHall();
        while ($game->playerFirstOpen(rand(0,2)) != "Car")
        {
            $hostOppenedDor = $game->hostOpen();
            $this->assertTrue(is_integer($hostOppenedDor));
        }
        $this->assertTrue(true);
    }

    /**
     * @author Dusan Perisic
     */
    public function testPlayerSecondStep()
    {
        $game = new MontyHall();
        while ($game->playerFirstOpen(rand(0,2)) != "Car")
        {
            $game->hostOpen();
            $result = $game->playerSecondStep();
            $this->assertTrue(is_string($result));
        }
        while ($game->playerFirstOpen(rand(0,2)) != "Car")
        {
            $game->hostOpen();
            $result = $game->playerSecondStep(true);
            $this->assertTrue(is_string($result));
        }
        $this->assertTrue(true);
    }

    /**
     * @author Dusan Perisic
     */
    public function testStrategy()
    {
        $strategy = new MontyHallStrategy();
        $strategyChangeDor = $strategy->runStrategy(true);
        $strategyStickDor = $strategy->runStrategy(false);

        $this->assertArrayHasKey("Car", $strategyChangeDor);
        $this->assertArrayHasKey("Goat", $strategyStickDor);
        $this->assertTrue(is_integer($strategyChangeDor["Car"]));
        $this->assertTrue(is_integer($strategyChangeDor["Goat"]));
        $this->assertTrue(is_integer($strategyStickDor["Car"]));
        $this->assertTrue(is_integer($strategyStickDor["Goat"]));
    }
}
