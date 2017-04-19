<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/19/2017
 * Time: 12:20
 */

namespace App;


/**
 * Class Book
 *
 * @package App
 * @author  Dusan Perisic
 */
class Book {
    /**
     * @var string
     */
    private $title;
    /**
     * @var int
     */
    private $cost;

    /**
     * Book constructor.
     *
     * @param string $title
     */
    public function __construct( string $title)
    {
        $this->title = $title;
        $this->cost = 8;
    }

    /**
     * @return string
     * @author Dusan Perisic
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     * @author Dusan Perisic
     */
    public function getCost()
    {
        return $this->cost;
    }
}