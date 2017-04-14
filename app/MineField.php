<?php
/**
 * Created by PhpStorm.
 * User: duXor
 * Date: 4/14/2017
 * Time: 15:53
 */

namespace App;


/**
 * Class MineField
 *
 * @package App
 * @author  Dusan Perisic
 */
class MineField {
    /**
     * @var
     */
    private $table;
    /**
     * @var
     */
    private $convertedTable;
    /**
     * @var
     */
    public  $height;
    /**
     * @var
     */
    public  $width;
    /**
     * @var string
     */
    private $mineChar = "*";

    /**
     * MineField constructor.
     *
     * @param null $table
     */
    public function __construct( $table = null)
    {
        if ($table)
            $this->setTable($table);
    }

    /**
     * @param array $table
     * @author Dusan Perisic
     */
    private function setTable( array $table)
    {
        $this->table = $table;
        $this->height = count($table);
        $this->width = count($table[0]);
    }

    /**
     * @param array $table
     * @return mixed
     * @author Dusan Perisic
     */
    public function convertTable( array $table)
    {
        $this->setTable($table);
        return $this->convert();
    }

    /**
     * @return mixed
     * @author Dusan Perisic
     */
    private function convert()
    {
        $this->convertedTable = $this->table;
        for ($i = 0; $i < $this->height; $i++)
        {
            for ($j = 0; $j < $this->width; $j++)
            {
                if ($this->convertedTable[$i][$j] != $this->mineChar)
                {
                    $this->convertedTable[$i][$j] = $this->sumOfMine($i, $j);
                }
            }
        }
        return $this->convertedTable;
    }

    /**
     * @param int $i
     * @param int $j
     * @return int
     * @author Dusan Perisic
     */
    private function sumOfMine( int $i, int $j)
    {
        $i_from = $i - 1 >= 0 ? $i - 1 : 0;
        $i_to = $i + 2 <= $this->height ? $i + 2 : $this->height;

        $j_from = $j - 1 >= 0 ? $j - 1 : 0;
        $j_to = $j + 2 <= $this->width ? $j + 2 : $this->width;
        $numberOfMines = 0;

        for ($_i = $i_from; $_i < $i_to; $_i++)
        {
            for ($_j = $j_from; $_j < $j_to; $_j++)
            {
                if ($this->convertedTable[$_i][$_j] === $this->mineChar)
                {
                    $numberOfMines++;
                }
            }
        }

        return $numberOfMines;
    }
}