<?php
namespace Sidekicker;

/**
 * Support class to run the game and load the inputs
 * Class Game
 * @package Sidekicker
 */
class Game
{
    private $inputFileName;
    private $grid = null;

    /**
     * Game constructor.
     * @param $inputFileName string File name where data is stored
     */
    public function __construct($inputFileName)
    {
        $this->inputFileName = $inputFileName;
    }

    /**
     * Reads a file formatted as a grid. Dead cells are represented by spaces and live cells are represented by any character
     * @return array
     * @throws \Exception
     */
    private function readFile()
    {
        $handle = @fopen($this->inputFileName, "r");
        if ($handle) {
            $sizeX = 0;
            $sizeY = 0;
            $grid = [];
            while (($line = fgets($handle)) !== false) {
                // Remove trailing new line if exists
                $line = preg_replace('/\n$/','', $line);
                $lineArr = str_split($line);
                $lineLength = count($lineArr);
                if ($sizeX !== 0 && $lineLength !== $sizeX) {
                    throw new \Exception("Lines in input file has inconsistent lengths");
                } else {
                    $sizeX = $lineLength;
                }

                for ($i = 0; $i < $sizeX; $i++) {
                    // True means the cell is live, we will accept any character to mark live
                    $grid[$i][$sizeY] = $lineArr[$i] != " ";
                }

                $sizeY++;
            }
            $this->grid = new Grid($grid, $sizeX, $sizeY);
            fclose($handle);

            return $grid;
        } else {
            throw new \Exception("File not found");
        }
    }

    /**
     * Starts the game. Throws exceptions if there are are any issues with the inputs.
     */
    public function start()
    {
        $this->readFile();
    }

    public function nextTick()
    {
        return $this->grid->nextTick();
    }

    /**
     * This function will display the grid results. Can format the results anyway you would like
     */
    public function showGrid()
    {
        echo "\n\n";
        $grid = $this->grid->getGridArray();
        for ($i = 0; $i < $this->grid->getSizeY(); $i++) {
            echo "\n";
            for ($j = 0; $j < $this->grid->getSizeX(); $j++) {
                if ($grid[$j][$i]) {
                    echo 'O';
                } else {
                    echo '-';
                }
            }
        }

    }

    /**
     * @return Grid
     */
    public function getGrid()
    {
        return $this->grid;
    }
}
