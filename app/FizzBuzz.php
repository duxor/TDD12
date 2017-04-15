<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/15/2017
 * Time: 06:43
 */

namespace App;


class FizzBuzz {
    private $number;
    public function getOutput(int $number)
    {
        $this->number = $number;
        $output = $this->mulltiple($this->mulltiple("", 3, "Fizz"), 5, "Buzz");
        return $output ? $output : $this->number;
    }
    private function mulltiple(string $output, int $multipleByNumber, string $changeNumberByString)
    {
        return $output .
        (
            $this->number % $multipleByNumber == 0 ?
                $changeNumberByString :
                ""
        );
    }
}