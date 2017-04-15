<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/15/2017
 * Time: 02:23
 */

namespace App;


/**
 * Class MontyHall
 *
 * @package App
 * @author  Dusan Perisic
 */
class MontyHall {
    /**
     * @var
     */
    protected $changeDor;
    /**
     * @var
     */
    protected $carDor;
    /**
     * @var
     */
    protected $playerOpen;
    /**
     * @var
     */
    protected $hostOpen;
    /**
     * @var string
     */
    protected $playerNextStep = "PlayerSecondStep";

    /**
     * MontyHall constructor.
     *
     * @param bool $changeDor
     */
    public function __construct( $changeDor = false)
    {
        $this->setGame($changeDor);
    }

    /**
     * @param bool $changeDor
     * @author Dusan Perisic
     */
    protected function setGame( $changeDor = false)
    {
        $this->carDor = rand(0,2);
        $this->playerOpen = null;
        $this->changeDor = $changeDor;
    }

    /**
     * @param int $dorId
     * @return string
     * @author Dusan Perisic
     */
    public function playerFirstOpen( int $dorId)
    {
        $this->playerOpen = $dorId;
        if ($this->carDor == $this->playerOpen)
        {
            return "Car";
        }
        else
        {
            return $this->playerNextStep;
        }
    }

    /**
     * @return int
     * @author Dusan Perisic
     */
    public function hostOpen()
    {
        return $this->hostOpen = 3 - $this->playerOpen - $this->carDor;
    }

    /**
     * @param null $change
     * @return string
     * @author Dusan Perisic
     */
    public function playerSecondStep( $change = null)
    {
        if ($change != null)
        {
            $this->changeDor = $change;
        }
        if ($this->changeDor)
        {
            $this->playerOpen = $this->hostOpen;
        }
        if ($this->playerOpen == $this->carDor)
        {
            $output = "Car";
        }
        else
        {
            $output = "Goat";
        }
        $this->setGame();

        return $output;
    }
}