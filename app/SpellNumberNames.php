<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/14/2017
 * Time: 11:52
 */

namespace App;


/**
 * Class SpellNumberNames
 *
 * @package App
 * @author  Dusan Perisic
 */
class SpellNumberNames {
    /**
     * @var array
     */
    private $oneDigits = [
        "",
        "one",
        "two",
        "three",
        "four",
        "five",
        "six",
        "seven",
        "eight",
        "nine"
    ];
    /**
     * @var array
     */
    private $twoDigits   = [
        10 => "ten",
        11 => "eleven",
        12 => "twelve",
        13 => "thirteen",
        14 => "fourteen",
        15 => "fifteen",
        16 => "sixteen",
        17 => "seventeen",
        18 => "eighteen",
        19 => "nineteen",
        20 => "twenty",
        30 => "thirty",
        40 => "forty",
        50 => "fifty",
        60 => "sixty",
        70 => "seventy",
        80 => "eighty",
        90 => "ninety"
    ];
    /**
     * @var array
     */
    private $digitsGroup = [
        1 => "",
        2 => "thousand",
        3 => "million",
        4 => "billion",
        5 => "trillion",
        6 => "quadrillion",
        7 => "quintillion",
        8 => "sextillion",
        9 => "septillion",
        10 => "octillion",
        11 => "nonillion",
        12 => "decillion"
    ];
    /**
     * @param int $number
     * @return string
     * @author Dusan Perisic
     */
    public function spell( int $number)
    {
        return $this->outputParse($this->checkDigitsGroup($number));
    }

    /**
     * @param int $number
     * @param int $groupIndex
     * @return string
     * @author Dusan Perisic
     */
    private function checkDigitsGroup( int $number, int $groupIndex = 1)
    {
        if ($number == 0)
        {
            return "";
        }
        else
        {
            return
                $this->checkDigitsGroup((int)($number / 1000), $groupIndex + 1) .
                $this->checkThreeDigits($number % 1000) . $this->digitsGroup[$groupIndex] .
                " ";
        }
    }

    /**
     * @param int $number
     * @return int|string
     * @author Dusan Perisic
     */
    private function checkThreeDigits(int $number)
    {
        $output = (int)($number / 100);
        $output = $output > 0 ? ($this->oneDigits[$output] . " hundred ") : "";
        $output .= $this->checkTwoDigits($number % 100);

        return $output;
    }

    /**
     * @param int $number
     * @return mixed|string
     * @author Dusan Perisic
     */
    private function checkTwoDigits(int $number)
    {
        if ($number > 9)
        {
            if ($number < 20)
            {
                $output = $this->twoDigits[$number] . " ";
            }
            else
            {
                $output =
                    $this->twoDigits[(int)($number / 10) * 10] .
                    " " .
                    ($number % 10 > 0 ? ($this->oneDigits[$number % 10] . " ") : "");
            }
        }
        else
        {
            $output =
                $number > 0 ?
                    ($this->oneDigits[$number] . " ") :
                    "";
        }

        return $output;
    }

    /**
     * @param string $output
     * @return string
     * @author Dusan Perisic
     */
    public function outputParse(string $output)
    {
        while (strlen($output) && $output[strlen($output) - 1] == " ")
        {
            $output = substr($output, 0, strlen($output) - 1);
        }
        return $output;
    }
}