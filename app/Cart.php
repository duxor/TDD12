<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/19/2017
 * Time: 12:59
 */

namespace App;


/**
 * Class Cart
 *
 * @package App
 * @author  Dusan Perisic
 */
class Cart {
    /**
     * @var array
     */
    private $items;
    /**
     * @var array
     */
    private $discounts;

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        $this->items = [];
        $this->discounts = [
            0 => 0,
            1 => 0,
            2 => 5,
            3 => 10,
            4 => 20,
            5 => 25
        ];
    }

    /**
     * @param \App\Book $book
     * @param int       $count
     * @return \App\CartItem|mixed
     * @author Dusan Perisic
     */
    public function add( Book $book, int $count)
    {
        foreach($this->items as $index => $item)
        {
            if ($item->getItem()->getTitle() == $book->getTitle())
            {
                $this->items[$index]->addCount($count);
                return $this->items[$index];
            }
        }
        $added = new CartItem($book, $count);
        array_push($this->items, $added);
        return $added;
    }

    /**
     * @param int $index
     * @return \App\Book
     * @author Dusan Perisic
     */
    public function getItem( int $index = 0): Book {
        if (isset($this->items[$index]))
        {
            return $this->items[$index];
        }
        else
        {
            return null;
        }
    }

    /**
     * @return array
     */
    public function getItems(): array{
        return $this->items;
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    public function getCost()
    {
        $allSums = [];
        for($maxGroupSize = 5; $maxGroupSize > 0; $maxGroupSize--){

            $sum  = 0;
            $cart = unserialize(serialize($this->items));

            $test = true;
            while( $test ){
                $partSum      = 0;
                $partSumCount = 0;
                $test         = false;
                foreach( $cart as $i => $item ){
                    if( $item->getCount() > 0 && $partSumCount < $maxGroupSize){
                        $book = $item->getItem();
                        $partSum += $book->getCost();

                        $cart[ $i ]->addCount( -1 );
                        $partSumCount++;

                        if( $cart[ $i ]->getCount() > 0 ){
                            $test = true;
                        }
                    }
                    else
                    {
                        if( $cart[ $i ]->getCount() > 0 ){
                            $test = true;
                        }
                    }

                }
                $sum += $partSum - $this->discounts[ $partSumCount ] / 100 * $partSum;
            }
            array_push($allSums, $sum);
        }
        return min($allSums);
    }

}