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
    private $numberOfTests = 10;
    /**
     * @var
     */
    private $memory;

    /**
     * @param bool $changeDor
     * @return mixed
     * @author Dusan Perisic
     */
    public function runStrategy( bool $changeDor = false)
    {
        $this->changeDor = $changeDor;
        $this->memory = [
            "Car" => 0,
            "Goat"=> 0
        ];

        return $this->playStrategy($this->numberOfTests);
    }

    /**
     * @param $testNumber
     * @return mixed
     * @author Dusan Perisic
     */
    private function playStrategy( $testNumber)
    {
        if ($testNumber < 0)
        {
            return $this->memory;
        }
        else
        {
            $this->setGame();
            $playerOption = $this->playerFirstOpen(rand(0,2));
            if ($playerOption == $this->playerNextStep)
            {
                $this->hostOpen();
                $playerOption = $this->playerSecondStep($this->changeDor);
            }
            $this->memory[$playerOption]++;
            return $this->playStrategy($testNumber - 1);
        }
    }
}