<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/18/2017
 * Time: 21:50
 */

namespace App;


/**
 * Class Poker
 *
 * @package App
 * @author  Dusan Perisic
 */
class Poker {
    /**
     * @var array
     */
    private $players;

    /**
     * Poker constructor.
     */
    public function __construct(){
        $this->players = [];
    }

    /**
     * @param string $playerName
     * @param array  $cards
     * @author Dusan Perisic
     */
    public function setPlayerHand( string $playerName, array $cards)
    {
        array_push($this->players, new Hand($playerName, $cards));
    }

    /**
     * @author Dusan Perisic
     */
    public function resetPlayers()
    {
        $this->players = [];
    }

    /**
     * @return string
     * @author Dusan Perisic
     */
    public function playRound()
    {
        if ($this->players[0]->getScore() == $this->players[1]->getScore())
        {
            return "Tie";
        }
        if ($this->players[0]->getScore() > $this->players[1]->getScore())
        {
            $winner = 0;
        }
        else
        {
            $winner = 1;
        }
        $output = $this->players[$winner]->getPlayerName() . " wins - " . $this->players[$winner]->getScoreName();
        if ($this->players[$winner]->getScoreName() == "High Card")
        {
            $output .= ": " . $this->players[$winner]->diff($this->players[($winner + 1) % 2]);
        }
        return $output;
    }
}