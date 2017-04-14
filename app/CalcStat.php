<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/12/2017
 * Time: 22:36
 */

namespace App;


/**
 * Class calcStat
 *
 * @package App
 * @author  Dusan Perisic
 */
class CalcStat {
    /**
     * @var array
     */
    private $range = array();

    public function __construct(array $range){
        $this->range = $range;
    }
    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function minValue(){
        return min($this->range);
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function maxValue(){
        return max($this->range);
    }

    /**
     * @return int
     * @author Dusan Perisic
     */
    public function count(){
        return count($this->range);
    }

    /**
     * @return float
     * @author Dusan Perisic
     */
    public function averageValue(){
        return round(array_sum($this->range) / $this->count(), 2);
    }
}