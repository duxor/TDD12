<?php

namespace Tests\Feature;

use App\RecentlyUsedList;
use Tests\TestCase;

/**
 * Class RecentlyUsedListTest
 *
 * @package Tests\Feature
 * @author  Dusan Perisic
 */
class RecentlyUsedListTest extends TestCase
{
    /**
     * @author Dusan Perisic
     */
    public function testInitialStack()
    {
        $recentlyUsedList = RecentlyUsedList::getInstance();
        $this->assertTrue(!$recentlyUsedList->pop());
    }

    /**
     * @author Dusan Perisic
     */
    public function testLastInputFirstOutput()
    {
        $pushArray = [
            "aaaaaa",
            "ssssss",
            "dddddd",
            "ffffff"
        ];
        $recentlyUsedList = RecentlyUsedList::getInstance();
        foreach($pushArray as $v)
        {
            $recentlyUsedList->push($v);
        }
        for($i = count($pushArray) - 1; $i >= 0; $i--)
        {
            $this->assertEquals($pushArray[$i], $recentlyUsedList->pop());
        }
    }

    /**
     * @author Dusan Perisic
     */
    public function testInsertedString()
    {
        $pushArray = [
            "aaaaaa",
            "ssssss",
            "aaaaaa",
            "ffffff",
            "ffffff",
            "eeee",
            "ffffff",
            "fffffsasadadsaf",
            "aaaaaa",
        ];
        $recentlyUsedList = RecentlyUsedList::getInstance();
        foreach($pushArray as $v)
        {
            $recentlyUsedList->push($v);
        }
        $this->assertEquals("aaaaaa", $recentlyUsedList->pop());
        $this->assertEquals("fffffsasadadsaf", $recentlyUsedList->pop());
        $this->assertEquals("ffffff", $recentlyUsedList->pop());
        $this->assertEquals("eeee", $recentlyUsedList->pop());
        $this->assertEquals("ssssss", $recentlyUsedList->pop());
    }

    /**
     * @author Dusan Perisic
     */
    public function testStackLimit()
    {
        $recentlyUsedList = RecentlyUsedList::getInstance();
        $pushArray = [];
        $numberextraStringsForOwerflov = 10;
        for($i = 0, $max = $recentlyUsedList->getStackLimit() + $numberextraStringsForOwerflov; $i < $max; $i++)
        {
            array_push($pushArray, "string".$i);
            $recentlyUsedList->push("string".$i);
        }
        $this->assertEquals("string".($recentlyUsedList->getStackLimit() + $numberextraStringsForOwerflov - 1), $recentlyUsedList->pop());
        for($i = $recentlyUsedList->getStackLimit() - 1; $i >= 0; $i--)
        {
            $this->assertEquals($pushArray[$i], $recentlyUsedList->pop());
        }
    }
}
