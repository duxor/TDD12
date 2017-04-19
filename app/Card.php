<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/18/2017
 * Time: 21:51
 */

namespace App;


/**
 * Class Card
 *
 * @package App
 * @author  Dusan Perisic
 */
class Card {
    /**
     * @var
     */
    private $cardId;
    /**
     * @var
     */
    private $cardColor;
    /**
     * @var array
     */
    private $cardCosts = [
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        "T" => 10,
        "J" => 11,
        "Q" => 12,
        "K" => 13,
        "A" => 14
    ];
    /**
     * @var array
     */
    private $cardNames = [
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => "Jack",
        12 => "Queen",
        13 => "King",
        14 => "Ace"
    ];

    /**
     * Card constructor.
     *
     * @param string $card
     */
    public function __construct( string $card)
    {
        $this->cardId = $card[0];
        $this->cardColor = $card[1];
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function getCost()
    {
        return $this->cardCosts[$this->cardId];
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function getColor()
    {
        return $this->cardColor;
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function getName()
    {
        return $this->cardNames[$this->getCost()];
    }

    /**
     * @param \App\Card $card
     * @return bool
     * @author Dusan Perisic
     */
    public function isEqual( Card $card)
    {
        return $this->getName() == $card->getName();
    }
}