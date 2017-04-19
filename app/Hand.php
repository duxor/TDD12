<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/18/2017
 * Time: 21:51
 */

namespace App;


/**
 * Class Hand
 *
 * @package App
 * @author  Dusan Perisic
 */
class Hand {
    /**
     * @var string
     */
    private $playerName;
    /**
     * @var array
     */
    private $cards;
    /**
     * @var
     */
    private $markups;
    /**
     * @var int
     */
    private $cardsScore;
    /**
     * @var
     */
    private $handScoreId;
    /**
     * @var
     */
    private $handScoreName;
    /**
     * @var array
     */
    private $handNames = [
        [
            "value"     => 8000,
            "function"  => "isStraightFlush",
            "name"      => "Straight flush"
        ],
        [
            "value"     => 7000,
            "function"  => "isFourOfAKind",
            "name"      => "Four of a Kind"
        ],
        [
            "value"     => 6000,
            "function"  => "isFullHouse",
            "name"      => "Full House"
        ],
        [
            "value"     => 50000,
            "function"  => "isFlush",
            "name"      => "Flush"
        ],
        [
            "value"     => 4000,
            "function"  => "isStraight",
            "name"      => "Straight"
        ],
        [
            "value"     => 3000,
            "function"  => "isThreeOfAKind",
            "name"      => "Three of a Kind"
        ],
        [
            "value"     => 2000,
            "function"  => "isTwoPairs",
            "name"      => "Two Pairs"
        ],
        [
            "value"     => 1000,
            "function"  => "isPair",
            "name"      => "Pair"
        ],
        [
            "value"     => 0,
            "function"  => "isHighCard",
            "name"      => "High Card"
        ]
    ];

    /**
     * Hand constructor.
     *
     * @param string $playerName
     * @param array  $cards
     */
    public function __construct( string $playerName, array $cards)
    {
        $this->playerName = $playerName;
        $this->cards = [
            new Card($cards[0]),
            new Card($cards[1]),
            new Card($cards[2]),
            new Card($cards[3]),
            new Card($cards[4])
        ];
        $this->sortHand();
        $this->findMarkups();
        $this->cardsScore = 0;
        $this->calculateCardsScore();
        $this->calculateHandScore();
    }

    /**
     * @author Dusan Perisic
     */
    private function sortHand()
    {
        for($i = 0; $i<4; $i++)
        {
            for($j = $i+1; $j<5; $j++)
            {
                if ($this->cards[$i]->getCost() < $this->cards[$j]->getCost())
                {
                    $p = $this->cards[$i];
                    $this->cards[$i] = $this->cards[$j];
                    $this->cards[$j] = $p;
                }
            }
        }
    }

    /**
     * @author Dusan Perisic
     */
    private function findMarkups()
    {
        $this->markups = [];
        for($i = 0; $i < 5; $i++)
        {
            $test = true;
            foreach($this->markups as $j => $markup)
            {
                if ($markup[0]->getCost() == $this->cards[$i]->getCost())
                {
                    array_push($this->markups[$j], $this->cards[$i]);
                    $test = false;
                    break;
                }
            }
            if ($test)
            {
                array_push($this->markups, [$this->cards[$i]]);
            }
        }
        foreach($this->markups as $i => $markup)
        {
            $this->markups[$i] = sizeof($this->markups[$i]);
        }
    }

    /**
     * @param int $index
     * @return int
     * @author Dusan Perisic
     */
    private function calculateCardsScore( int $index = 4)
    {
        if ($index < 0)
        {
            return 0;
        }
        else
        {
            return $this->cardsScore += (4 - $index) * 20 + $this->cards[$index]->getCost() + $this->calculateCardsScore($index - 1);
        }
    }

    /**
     * @author Dusan Perisic
     */
    private function calculateHandScore()
    {
        foreach($this->handNames as $i => $handName)
        {
            $function = $handName["function"];
            if ($this->$function())
            {
                $this->handScoreId = $i;
                return;
            }
        }
    }

    /**
     * @param bool   $case
     * @param string $message
     * @return bool
     * @author Dusan Perisic
     */
    private function testHand( bool $case = false, string $message = "")
    {
        if ($case)
        {
            $this->handScoreName = $message;
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param bool $straight
     * @param bool $flush
     * @return bool
     * @author Dusan Perisic
     */
    private function isStraightFlush( bool $straight = true, bool $flush = true)
    {
        $color = null;
        $nextCardCost = null;
        foreach($this->cards as $i => $card)
        {
            if ($i == 0)
            {
                if ($flush)
                {
                    $color = $this->cards[0]->getColor();
                }
            }
            else
            {
                if (($straight ? ($this->cards[$i]->getCost() != $nextCardCost) : false) ||
                    ($flush ? ($this->cards[$i]->getColor() != $color) : false))
                {
                    return false;
                }
            }
            if ($straight)
            {
                $nextCardCost = $this->cards[$i]->getCost() - 1;
            }
        }
        $this->handScoreName = ($straight ? "Straight" : "") .
            ($straight && $flush ? " " : "") .
            ($flush ? "Flush" : "");
        return true;
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    private function isFourOfAKind()
    {
        return $this->testHand(max($this->markups) == 4 && sizeof($this->markups) == 2, "Four of a Kind");
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    private function isFullHouse()
    {
        return $this->testHand(max($this->markups) == 3 && sizeof($this->markups) == 2, "Full House");
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    private function isFlush()
    {
        return $this->isStraightFlush(false, true);
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    private function isStraight()
    {
        if (max($this->markups) > 1)
        {
            return false;
        }
        else
        {
            return $this->isStraightFlush(true, false);
        }
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    private function isThreeOfAKind()
    {
        return $this->testHand(max($this->markups) == 3 && sizeof($this->markups) == 3, "Three of a Kind");
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    private function isTwoPairs()
    {
        return $this->testHand(max($this->markups) == 2 && sizeof($this->markups) == 3, "Two Pairs");
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    private function isPair()
    {
        return $this->testHand(max($this->markups) == 2 && sizeof($this->markups) == 4, "Pair");
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    private function isHighCard()
    {
        return $this->testHand(max($this->markups) == 1, "High Card");
    }

    /**
     * @return int
     * @author Dusan Perisic
     */
    public function getScore()
    {
        return $this->cardsScore + $this->handNames[$this->handScoreId]["value"];
    }

    /**
     * @return string
     * @author Dusan Perisic
     */
    public function getPlayerName()
    {
        return $this->playerName;
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function getScoreName()
    {
        return $this->handScoreName;
    }

    /**
     * @param \App\Hand $hand
     * @return string
     * @author Dusan Perisic
     */
    public function diff( Hand $hand)
    {
        for($i = 0; $i < 5; $i++)
        {
            if ($this->cards[$i]->getCost() > $hand->cards[$i]->getCost())
            {
                return $this->cards[$i]->getName();
            }
            elseif ($this->cards[$i]->getCost() > $hand->cards[$i]->getCost())
            {
                return $hand->cards[$i]->getName();
            }
        }
        return "";
    }
}