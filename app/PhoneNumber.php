<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/17/2017
 * Time: 20:42
 */

namespace App;


/**
 * Class PhoneNumber
 *
 * @package App
 * @author  Dusan Perisic
 */
class PhoneNumber {
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $phone;

    /**
     * PhoneNumber constructor.
     *
     * @param string $name
     * @param string $phone
     */
    public function __construct( string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * @param string $phone
     * @return bool
     * @author Dusan Perisic
     */
    public function isPhoneStartsWith( string $phone)
    {

        return strpos(str_replace(" ", "", $this->phone), str_replace(" ", "", $phone)) === 0;
    }

    /**
     * @return string
     * @author Dusan Perisic
     */
    public function getPhoneNumber()
    {
        return $this->phone;
    }
}