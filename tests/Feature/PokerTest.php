<?php

namespace Tests\Feature;

use App\Poker;
use Tests\TestCase;

/**
 * Class PokerTest
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class PokerTest extends TestCase
{
    /**
     * @author Dusan Perisic
     */
    public function testHighCard()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "3D", "5S", "9C", "KD"]);
        $poker->setPlayerHand("White", ["2C", "3H", "4S", "8C", "AH"]);
        $this->assertEquals("White wins - High Card: Ace", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "3D", "5S", "9C", "KD"]);
        $poker->setPlayerHand("White", ["2C", "3H", "4S", "8C", "KH"]);
        $this->assertEquals("Black wins - High Card: 9", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testPair()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "3S", "5C", "2D", "4H"]);
        $poker->setPlayerHand("White", ["2S", "8D", "AS", "QS", "3S"]);
        $this->assertEquals("Black wins - Pair", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testTwoPairs()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "3S", "5C", "2D", "5H"]);
        $poker->setPlayerHand("White", ["2S", "8D", "AD", "QS", "3S"]);
        $this->assertEquals("Black wins - Two Pairs", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testTreeOfAKind()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "3S", "2C", "2D", "5H"]);
        $poker->setPlayerHand("White", ["2S", "8D", "AS", "QS", "3S"]);
        $this->assertEquals("Black wins - Three of a Kind", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "3S", "2C", "2D", "5H"]);
        $poker->setPlayerHand("White", ["3S", "3D", "AS", "QS", "3S"]);
        $this->assertEquals("White wins - Three of a Kind", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "3S", "2C", "2D", "5H"]);
        $poker->setPlayerHand("White", ["2H", "4S", "2C", "2D", "5H"]);
        $this->assertEquals("White wins - Three of a Kind", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testStraight()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "3S", "4C", "5D", "6H"]);
        $poker->setPlayerHand("White", ["2S", "8D", "AS", "QS", "3S"]);
        $this->assertEquals("Black wins - Straight", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "3S", "4C", "5D", "6H"]);
        $poker->setPlayerHand("White", ["3S", "4D", "5S", "6S", "7S"]);
        $this->assertEquals("White wins - Straight", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testFlush()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "3H", "5H", "2H", "4H"]);
        $poker->setPlayerHand("White", ["2S", "8S", "AS", "QS", "3S"]);
        $this->assertEquals("White wins - Flush", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2S", "7S", "AS", "QS", "3S"]);
        $poker->setPlayerHand("White", ["2S", "8S", "AS", "QS", "3S"]);
        $this->assertEquals("White wins - Flush", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testFullHouse()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "4S", "4C", "2D", "4H"]);
        $poker->setPlayerHand("White", ["2D", "8D", "AS", "QS", "3S"]);
        $this->assertEquals("Black wins - Full House", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testFourOfAKind()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "2D", "2S", "2C", "KD"]);
        $poker->setPlayerHand("White", ["2D", "3H", "5C", "9S", "KH"]);
        $this->assertEquals("Black wins - Four of a Kind", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "2D", "2S", "2C", "KD"]);
        $poker->setPlayerHand("White", ["2H", "2D", "2S", "2C", "AD"]);
        $this->assertEquals("White wins - Four of a Kind", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testStraightFlush()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "3H", "4H", "5H", "6H"]);
        $poker->setPlayerHand("White", ["2D", "3H", "5C", "9S", "KH"]);
        $this->assertEquals("Black wins - Straight Flush", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "3H", "4H", "5H", "6H"]);
        $poker->setPlayerHand("White", ["3D", "4D", "5D", "6D", "7D"]);
        $this->assertEquals("White wins - Straight Flush", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "3H", "4H", "5H", "6H"]);
        $poker->setPlayerHand("White", ["8D", "9D", "TD", "JD", "QD"]);
        $this->assertEquals("White wins - Straight Flush", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "3H", "4H", "5H", "6H"]);
        $poker->setPlayerHand("White", ["TD", "JD", "QD", "KD", "AD"]);
        $this->assertEquals("White wins - Straight Flush", $poker->playRound());
    }

    /**
     * @author Dusan Perisic
     */
    public function testTie()
    {
        $poker = new Poker();

        $poker->setPlayerHand("Black", ["2H", "3D", "5S", "9C", "KD"]);
        $poker->setPlayerHand("White", ["2D", "3H", "5C", "9S", "KH"]);
        $this->assertEquals("Tie", $poker->playRound());

        $poker->resetPlayers();
        $poker->setPlayerHand("Black", ["2H", "3H", "4H", "5H", "6H"]);
        $poker->setPlayerHand("White", ["2H", "3H", "4H", "5H", "6H"]);
        $this->assertEquals("Tie", $poker->playRound());
    }
}
