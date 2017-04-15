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
        $this->assertTrue(is_integer($playerFirstStep));
    }

    /**
     * @author Dusan Perisic
     */
    public function testHostOpenDor()
    {
        $game = new MontyHall();
        $hostOppenedDor = $game->hostOpen();
        $this->assertTrue(is_integer($hostOppenedDor));
    }

    /**
     * @author Dusan Perisic
     */
    public function testPlayerSecondStep()
    {
        $game = new MontyHall();
        $playerOption = $game->playerFirstOpen(rand(0,2));
        $hostOption = $game->hostOpen();
        $this->assertTrue($playerOption != $hostOption);
        $result = $game->playerSecondStep();
        $this->assertTrue(is_string($result));

        $game = new MontyHall();
        $playerOption = $game->playerFirstOpen(rand(0,2));
        $hostOption = $game->hostOpen();
        $this->assertTrue($playerOption != $hostOption);
        $result = $game->playerSecondStep(true);
        $this->assertTrue(is_string($result));
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
