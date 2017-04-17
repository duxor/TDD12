<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/17/2017
 * Time: 20:42
 */

namespace App;


/**
 * Class PhoneBook
 *
 * @package App
 * @author  Dusan Perisic
 */
class PhoneBook {
    /**
     * @var array
     */
    private $list;

    /**
     * PhoneBook constructor.
     */
    public function __construct()
    {
        $this->list = array();
    }

    /**
     * @param \App\PhoneNumber $phoneNumber
     * @author Dusan Perisic
     */
    public function addNumber( PhoneNumber $phoneNumber)
    {
        array_push($this->list, $phoneNumber);
    }

    /**
     * @return bool
     * @author Dusan Perisic
     */
    public function isConsistent()
    {
        foreach($this->list as $testNumberIndex => $testNumber)
        {
            foreach($this->list as $prefixNumberIndex => $prefixNumber)
            {
                if ($testNumberIndex != $prefixNumberIndex && $testNumber->isPhoneStartsWith($prefixNumber->getPhoneNumber()))
                {
                    return false;
                }
            }
        }
        return true;
    }
}