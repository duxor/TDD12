<?php

namespace Tests\Feature;

use App\FizzBuzz;
use Tests\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFizzBuzz()
    {
        $fizzBuzz = new FizzBuzz();

        $this->assertEquals(1, $fizzBuzz->getOutput(1));
        $this->assertEquals(2, $fizzBuzz->getOutput(2));
        $this->assertEquals("Fizz", $fizzBuzz->getOutput(3));
        $this->assertEquals(4, $fizzBuzz->getOutput(4));
        $this->assertEquals("Buzz", $fizzBuzz->getOutput(5));
        $this->assertEquals("Fizz", $fizzBuzz->getOutput(6));
        $this->assertEquals("FizzBuzz", $fizzBuzz->getOutput(15));
        $this->assertEquals("FizzBuzz", $fizzBuzz->getOutput(60));
        $this->assertEquals("Fizz", $fizzBuzz->getOutput(96));
        $this->assertEquals(97, $fizzBuzz->getOutput(97));
        $this->assertEquals(98, $fizzBuzz->getOutput(98));
        $this->assertEquals("Fizz", $fizzBuzz->getOutput(99));
    }
}
