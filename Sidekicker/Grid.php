<?php
namespace Sidekicker;

/**
 * Runs the game after setting the initial input
 * Class Grid
 * @package Sidekicker
 */
class Grid
{
    private $grid;
    private $sizeX;
    private $sizeY;

    /**
     * Create a grid with an array
     * @param $grid array Two dimensional array representing a grid
     * @param $sizeX
     * @param $sizeY
     */
    public function __construct($grid, $sizeX, $sizeY)
    {
        $this->grid = $grid;
        $this->sizeX = $sizeX;
        $this->sizeY = $sizeY;
    }

    /**
     * @return array
     */
    public function getGridArray()
    {
        return $this->grid;
    }

    /**
     * @return integer
     */
    public function getSizeX()
    {
        return $this->sizeX;
    }

    /**
     * @return integer
     */
    public function getSizeY()
    {
        return $this->sizeY;
    }

    /**
     * Simulates a time step and update the grid values based on the current grid values
     */
    public function nextTick()
    {
        $nextGrid = [];
        for ($i = 0; $i < $this->sizeX; $i++) {
            for ($j = 0; $j < $this->sizeY; $j++) {
                $liveCount= $this->countLiveNeighbours($i, $j);
                if ($liveCount < 2 || $liveCount > 3) {
                    $nextGrid[$i][$j] = false;
                } else if ($liveCount === 2) {
                    $nextGrid[$i][$j] = $this->grid[$i][$j];
                } else { // $liveCount === 3
                    $nextGrid[$i][$j] = true;
                }
            }
        }
        $this->grid = $nextGrid;
    }

    /**
     * Counts the number of live neighbours around a given coordinate
     * @param $x
     * @param $y
     * @return int
     */
    public function countLiveNeighbours($x, $y)
    {
        $liveCount = 0;
        // Much simpler to repeat this rather than using nested four loops
        $liveCount += $this->getWrappedValue($x - 1, $y - 1);
        $liveCount += $this->getWrappedValue($x, $y - 1);
        $liveCount += $this->getWrappedValue($x + 1, $y - 1);
        $liveCount += $this->getWrappedValue($x - 1, $y);
        $liveCount += $this->getWrappedValue($x + 1, $y);
        $liveCount += $this->getWrappedValue($x - 1, $y + 1);
        $liveCount += $this->getWrappedValue($x, $y + 1);
        $liveCount += $this->getWrappedValue($x + 1, $y + 1);

        return $liveCount;
    }

    /**
     * Returns the value of a neighbour taking the wrapping into consideration
     * @param $x
     * @param $y
     * @return int
     */
    public function getWrappedValue($x, $y)
    {
        $wrappedX = $this->wrapCoordinate($x, $this->sizeX - 1);
        $wrappedY = $this->wrapCoordinate($y, $this->sizeY - 1);

        return $this->grid[$wrappedX][$wrappedY] ? 1 : 0;
    }

    /**
     * Calculates a generic coordinate value, when the grid is wrapped, based on the position and size of the grid
     * @param $val
     * @param $max
     * @return int
     */
    private function wrapCoordinate($val, $max)
    {
        if ($val > $max) {
            return 0;
        } else if ($val < 0) {
            return $max;
        }

        return $val;
    }
}
