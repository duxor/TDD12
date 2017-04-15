<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/15/2017
 * Time: 02:30
 */

namespace App;

/**
 * Class MontyHallStrategy
 *
 * @package App
 * @author  Dusan Perisic
 */
class MontyHallStrategy extends MontyHall  {
    /**
     * @var int
     */
    private $numberOfTests = 1000;
    /**
     * @var
     */
    private $memory;

    /**
     * @param bool $changeDor
     * @return array
     * @author Dusan Perisic
     */
    public function runStrategy( bool $changeDor = false)
    {
        $this->changeDor = $changeDor;
        $this->memory = [
            "Car" => 0,
            "Goat"=> 0
        ];
        for($i = 0; $i < $this->numberOfTests; $i++)
        {
            $this->setGame();
            $this->playerFirstOpen(rand(0,2));
            $this->hostOpen();
            $playerOption = $this->playerSecondStep($this->changeDor);
            $this->memory[$playerOption]++;
        }

        return $this->memory;
    }
}