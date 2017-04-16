<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/16/2017
 * Time: 13:40
 */

namespace App;

/**
 * Class Range
 *
 * @package App
 * @author  Dusan Perisic
 */
abstract class Range {
    /**
     * @var
     */
    protected $from;
    /**
     * @var
     */
    protected $to;

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param $number
     * @return bool
     * @author Dusan Perisic
     */
    public function isInRange( $number){
        return ($this->from <= $number) and ($number <= $this->to);
    }

    /**
     * @param \App\Range $range
     * @return null|static
     * @author Dusan Perisic
     */
    public function intersection( Range $range){
        if ($this->isInRange($range->getFrom()) || $this->isInRange($range->getTo()))
        {
            return new static(max($this->from, $range->from), min($this->to, $range->getTo()));
        }
        else
        {
            return null;
        }
    }
}