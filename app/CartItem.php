<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/19/2017
 * Time: 13:07
 */

namespace App;


/**
 * Class CartItem
 *
 * @package App
 * @author  Dusan Perisic
 */
class CartItem {
    /**
     * @var \App\Book
     */
    private $item;
    /**
     * @var int
     */
    private $count;

    /**
     * CartItem constructor.
     *
     * @param \App\Book $book
     * @param int       $numberOfCopies
     */
    public function __construct( Book $book, int $numberOfCopies)
    {
        $this->item = $book;
        $this->count = $numberOfCopies;
    }

    /**
     * @param int $addon
     * @author Dusan Perisic
     */
    public function addCount( int $addon)
    {
        $this->count += $addon;
    }

    /**
     * @return \App\Book
     */
    public function getItem(): \App\Book{
        return $this->item;
    }

    /**
     * @return int
     */
    public function getCount(): int{
        return $this->count;
    }

}