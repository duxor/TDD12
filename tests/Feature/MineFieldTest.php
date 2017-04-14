<?php

namespace Tests\Feature;

use App\MineField;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MineFieldTest extends TestCase
{
    private $mineField = null;
    protected function getInstance()
    {
        if ($this->mineField)
        {
            return $this->mineField;
        }
        else
        {
            return $this->mineField = new MineField();
        }
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSampleTable()
    {
        $this->assertEquals(
            [
                ["*",   2,  1,   1],
                [1,     2,  "*", 1],
                [0,     1,  1,   1],
            ],
            $this->getInstance()->convertTable(
                [
                    ["*", ".", ".", "."],
                    [".", ".", "*", "."],
                    [".", ".", ".", "."],
                ]
            )
        );
    }
}
