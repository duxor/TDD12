<?php

namespace Tests\Feature;

use App\BookStore;
use Tests\TestCase;

/**
 * Class BookStoreTest
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class BookStoreTest extends TestCase
{
    /**
     * @author Dusan Perisic
     */
    public function testBookStore()
    {
        $store = new BookStore();
        $store->addBook("Harry Potter book 1");
        $store->addBook("Harry Potter book 2");
        $store->addBook("Harry Potter book 3");
        $store->addBook("Harry Potter book 4");
        $store->addBook("Harry Potter book 5");

        $store->addToCart(0, 2);
        $store->addToCart(1, 2);
        $store->addToCart(2, 2);
        $store->addToCart(3, 1);
        $store->addToCart(4, 1);

        $this->assertEquals(51.2, $store->getBill());
    }
}
