<?php

namespace Tests\Feature;

use App\PhoneBook;
use App\PhoneNumber;
use Tests\TestCase;

/**
 * Class PhoneNumbersTest
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class PhoneNumbersTest extends TestCase
{
    /**
     * @author Dusan Perisic
     */
    public function testPhonePrefix()
    {
        $phoneBook = new PhoneNumber("Bob", "123 321 432");
        $this->assertTrue($phoneBook->isPhoneStartsWith("1233"));
        $this->assertTrue($phoneBook->isPhoneStartsWith("123 3"));
        $this->assertTrue($phoneBook->isPhoneStartsWith("1 2 3 3"));
        $this->assertFalse($phoneBook->isPhoneStartsWith("1 2 3 4"));
        $this->assertFalse($phoneBook->isPhoneStartsWith("111"));
    }
    /**
     * @author Dusan Perisic
     */
    public function testListConsistent()
    {
        $phoneBook = new PhoneBook();
        $phoneBook->addNumber(new PhoneNumber("Bob", "91 12 54 26"));
        $phoneBook->addNumber(new PhoneNumber("Alice", "97 625 992"));
        $phoneBook->addNumber(new PhoneNumber("Emergency", "911"));
        $this->assertFalse($phoneBook->isConsistent());

        $phoneBook = new PhoneBook();
        $phoneBook->addNumber(new PhoneNumber("Bob", "062 122 54 26"));
        $phoneBook->addNumber(new PhoneNumber("Alice", "063 625 992"));
        $phoneBook->addNumber(new PhoneNumber("Emergency", "060 111 222"));
        $this->assertTrue($phoneBook->isConsistent());
    }
}
