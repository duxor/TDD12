<?php

namespace Tests\Feature;

use App\SpellNumberNames;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SpellNumberNamesTest extends TestCase
{
    protected $spellNumberNames = null;

    private function getInstance()
    {
        if ($this->spellNumberNames)
        {
            return $this->spellNumberNames;
        }
        else
        {
            return $this->spellNumberNames = new SpellNumberNames();
        }
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOneDigit()
    {
        $this->assertEquals('', $this->getInstance()->spell(0));
        $this->assertEquals('one', $this->getInstance()->spell(1));
        $this->assertEquals('two', $this->getInstance()->spell(2));
        $this->assertEquals('three', $this->getInstance()->spell(3));
        $this->assertEquals('four', $this->getInstance()->spell(4));
        $this->assertEquals('five', $this->getInstance()->spell(5));
        $this->assertEquals('six', $this->getInstance()->spell(6));
        $this->assertEquals('seven', $this->getInstance()->spell(7));
        $this->assertEquals('eight', $this->getInstance()->spell(8));
        $this->assertEquals('nine', $this->getInstance()->spell(9));
    }
    public function testTwoDigit()
    {
        $this->assertEquals("ten", $this->getInstance()->spell(10));
        $this->assertEquals("eleven", $this->getInstance()->spell(11));
        $this->assertEquals("twelve", $this->getInstance()->spell(12));
        $this->assertEquals("thirteen", $this->getInstance()->spell(13));
        $this->assertEquals("fourteen", $this->getInstance()->spell(14));
        $this->assertEquals("fifteen", $this->getInstance()->spell(15));
        $this->assertEquals("sixteen", $this->getInstance()->spell(16));
        $this->assertEquals("seventeen", $this->getInstance()->spell(17));
        $this->assertEquals("eighteen", $this->getInstance()->spell(18));
        $this->assertEquals("nineteen", $this->getInstance()->spell(19));
        $this->assertEquals("twenty", $this->getInstance()->spell(20));
        $this->assertEquals("twenty one", $this->getInstance()->spell(21));
        $this->assertEquals("thirty", $this->getInstance()->spell(30));
        $this->assertEquals("forty", $this->getInstance()->spell(40));
        $this->assertEquals("fifty", $this->getInstance()->spell(50));
        $this->assertEquals("sixty", $this->getInstance()->spell(60));
        $this->assertEquals("seventy", $this->getInstance()->spell(70));
        $this->assertEquals("eighty", $this->getInstance()->spell(80));
        $this->assertEquals("ninety", $this->getInstance()->spell(90));
        $this->assertEquals("ninety nine", $this->getInstance()->spell(99));
    }
    public function testThreeDigit()
    {
        $this->assertEquals("one hundred", $this->getInstance()->spell(100));
        $this->assertEquals("one hundred one", $this->getInstance()->spell(101));
        $this->assertEquals("one hundred ten", $this->getInstance()->spell(110));
        $this->assertEquals("one hundred eleven", $this->getInstance()->spell(111));
        $this->assertEquals("one hundred thirty three", $this->getInstance()->spell(133));
    }
    public function testFourDigit()
    {
        $this->assertEquals("one thousand", $this->getInstance()->spell(1000));
        $this->assertEquals("one thousand one hundred one", $this->getInstance()->spell(1101));
        $this->assertEquals("one thousand one hundred ten", $this->getInstance()->spell(1110));
        $this->assertEquals("one thousand one hundred eleven", $this->getInstance()->spell(1111));
        $this->assertEquals("one thousand one hundred thirty three", $this->getInstance()->spell(1133));
    }
    public function testFiveDigit()
    {
        $this->assertEquals("ten thousand", $this->getInstance()->spell(10000));
        $this->assertEquals("ten thousand one hundred one", $this->getInstance()->spell(10101));
        $this->assertEquals("ten thousand one hundred ten", $this->getInstance()->spell(10110));
        $this->assertEquals("ten thousand one hundred eleven", $this->getInstance()->spell(10111));
        $this->assertEquals("ten thousand one hundred thirty three", $this->getInstance()->spell(10133));
        $this->assertEquals("forty five thousand one hundred thirty three", $this->getInstance()->spell(45133));
    }
    public function testSixDigit()
    {
        $this->assertEquals("one million ten thousand", $this->getInstance()->spell(1010000));
        $this->assertEquals("eleven million ten thousand one hundred one", $this->getInstance()->spell(11010101));
        $this->assertEquals("one million ten thousand one hundred ten", $this->getInstance()->spell(1010110));
        $this->assertEquals("one million ten thousand one hundred eleven", $this->getInstance()->spell(1010111));
        $this->assertEquals("one million ten thousand one hundred thirty three", $this->getInstance()->spell(1010133));
        $this->assertEquals("four million forty five thousand one hundred thirty three", $this->getInstance()->spell(4045133));
    }
}
