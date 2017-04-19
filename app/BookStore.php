<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/19/2017
 * Time: 12:20
 */

namespace App;


/**
 * Class BookStore
 *
 * @package App
 * @author  Dusan Perisic
 */
class BookStore {
    /**
     * @var array
     */
    private $books;
    /**
     * @var \App\Cart
     */
    private $cart;

    /**
     * BookStore constructor.
     */
    public function __construct()
    {
        $this->books = [];
        $this->cart = new Cart();
    }

    /**
     * @param string $title
     * @return \App\Book|null
     * @author Dusan Perisic
     */
    public function addBook( string $title)
    {
        foreach($this->books as $book)
        {
            if ($book->getTitle() == $title)
            {
                return null;
            }
        }
        $added = new Book($title);
        array_push($this->books, $added);
        return $added;
    }

    /**
     * @author Dusan Perisic
     */
    public function resetBookList()
    {
        $this->books = [];
    }

    /**
     * @param int $bookIndex
     * @param int $numberOfCopies
     * @return \App\CartItem|mixed|null
     * @author Dusan Perisic
     */
    public function addToCart( int $bookIndex, int $numberOfCopies)
    {
        if (isset($this->books[$bookIndex]))
        {
            return $this->cart->add($this->books[$bookIndex], $numberOfCopies);
        }
        else
        {
            return null;
        }
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function getBill()
    {
        return $this->cart->getCost();
    }
}