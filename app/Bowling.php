<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/17/2017
 * Time: 11:33
 */

namespace App;


/**
 * Class Bowling
 *
 * @package App
 * @author  Dusan Perisic
 */
class Bowling {
    /**
     * @var
     */
    private $frames;
    /**
     * @var
     */
    private $bonuses;
    /**
     * @var
     */
    private $gameScore;

    /**
     * @param string $line
     * @return int
     * @author Dusan Perisic
     */
    public function getScore( string $line)
    {
        list($this->frames, $this->bonuses) = explode("||", $line);
        $this->frames = explode("|", $this->frames);
        $this->gameScore = $this->calculateFramesScore();
        return $this->gameScore;
    }

    /**
     * @param int $frame
     * @return int
     * @author Dusan Perisic
     */
    private function calculateFramesScore( int $frame = 9)
    {
        if ($frame < 0)
        {
            return 0;
        }
        else
        {
            $score = $this->getFrameScore($this->frames[$frame]);
            if ($this->frames[$frame] == "X")
            {
                $score += $this->getStrikeScore($frame);
            }
            else
            {
                if (strlen($this->frames[$frame]) > 1 ? ($this->frames[$frame][1] == "/") : false)
                {
                    $score += $this->getSpareScore($frame);
                }
            }
            return $score + $this->calculateFramesScore($frame - 1);
        }
    }

    /**
     * @param string $frame
     * @return int
     * @author Dusan Perisic
     */
    private function getFrameScore( string $frame)
    {
        $score = 0;
        if (isset($frame[1]))
        {
            $score = $this->getTurnScore($frame[1]);
        }
        if ($score != 10)
            $score += $this->getTurnScore($frame[0]);

        return $score;
    }

    /**
     * @param string $turn
     * @return int
     * @author Dusan Perisic
     */
    private function getTurnScore( string $turn)
    {
        if ($turn == "X" || $turn == "/")
        {
            return 10;
        }
        else
        {
            if ($turn == "-")
            {
                return 0;
            }
            else
            {
                return (int) $turn;
            }
        }
    }

    /**
     * @param int $frame
     * @return int
     * @author Dusan Perisic
     */
    private function getStrikeScore( int $frame)
    {
        $score = $this->getSpareScore($frame);
        if ($frame == 8)
        {
            if (isset($this->bonuses[0]))
                $score += $this->getTurnScore($this->bonuses[0]);
            return $score;
        }
        else
        {
            if ($frame == 9)
            {
                if (isset($this->bonuses[1]))
                    $score += $this->getTurnScore($this->bonuses[1]);
                return $score;
            }
            else
            {
                if (isset($this->frames[$frame + 1][1]))
                {
                    $score += $this->getFrameScore($this->frames[$frame + 1][1]);
                }
                else
                {
                    $score += $this->getFrameScore($this->frames[$frame + 2][0]);
                }
                return $score;
            }
        }
    }

    /**
     * @param int $frame
     * @return int
     * @author Dusan Perisic
     */
    private function getSpareScore( int $frame)
    {
        if ($frame == 9)
        {
            if (isset($this->bonuses[0]))
            {
                return $this->getTurnScore($this->bonuses[0]);
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return $this->getFrameScore($this->frames[$frame+1][0]);
        }
    }
}