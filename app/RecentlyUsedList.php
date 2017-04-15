<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/15/2017
 * Time: 12:44
 */

namespace App;


/**
 * Class RecentlyUsedList
 *
 * @package App
 * @author  Dusan Perisic
 */
class RecentlyUsedList {
    /**
     * @var
     */
    protected static $instance;

    /**
     * RecentlyUsedList constructor.
     */
    private function __construct(){
        $this->stack = [];
        $this->nextStackIndex = -1;
    }

    /**
     * @author Dusan Perisic
     */
    private function __clone(){}

    /**
     * @return \App\RecentlyUsedList
     * @author Dusan Perisic
     */
    public static function getInstance()
    {
        if(self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @var array
     */
    protected $stack;
    /**
     * @var int
     */
    protected $nextStackIndex;
    /**
     * @var int
     */
    protected $stackLimit = 100;

    /**
     * @param string $pushString
     * @return bool|string
     * @author Dusan Perisic
     */
    public function push( string $pushString)
    {
        if (strlen($pushString) < 1)
        {
            return false;
        }
        if ($this->isInserted($pushString))
            if ($this->nextStackIndex < $this->stackLimit)
            {
                $this->nextStackIndex++;
            }
        return $this->stack[$this->nextStackIndex] = $pushString;
    }

    /**
     * @return bool|mixed
     * @author Dusan Perisic
     */
    public function pop()
    {
        if ($this->nextStackIndex < 0)
        {
            return false;
        }
        $popedString = $this->stack[$this->nextStackIndex];
        $this->stack[$this->nextStackIndex] = null;
        $this->nextStackIndex--;
        return $popedString;
    }

    /**
     * @param string $str
     * @return bool
     * @author Dusan Perisic
     */
    protected function isInserted( string $str)
    {
        $test = true;
        foreach($this->stack as $i => $v)
        {
            if ($v == $str)
            {
                $test = false;
            }
            if (!$test)
            {
                $this->stack[$i] = isset($this->stack[$i+1]) ? $this->stack[$i+1] : null;
            }
        }
        return $test;
    }

    /**
     * @return int
     * @author Dusan Perisic
     */
    public function getStackLimit()
    {
        return $this->stackLimit;
    }
}