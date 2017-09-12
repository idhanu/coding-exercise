<?php
require_once 'Sidekicker/Game.php';
require_once 'Sidekicker/Grid.php';

use PHPUnit\Framework\TestCase;
use Sidekicker\Game;
/**
 * @covers Grid
 */
final class GridTest extends TestCase
{
    /**
     * @before
     */
    public function beforeEachTest()
    {
        $expectedGrid = array (
            0 =>
                array (
                    0 => true,
                    1 => true,
                    2 => false,
                    3 => false,
                    4 => false,
                    5 => false,
                ),
            1 =>
                array (
                    0 => false,
                    1 => false,
                    2 => false,
                    3 => false,
                    4 => true,
                    5 => false,
                ),
            2 =>
                array (
                    0 => false,
                    1 => false,
                    2 => false,
                    3 => false,
                    4 => false,
                    5 => false,
                ),
            3 =>
                array (
                    0 => true,
                    1 => false,
                    2 => false,
                    3 => true,
                    4 => true,
                    5 => true,
                ),
            4 =>
                array (
                    0 => false,
                    1 => true,
                    2 => false,
                    3 => false,
                    4 => true,
                    5 => false,
                ),
            5 =>
                array (
                    0 => false,
                    1 => true,
                    2 => true,
                    3 => true,
                    4 => false,
                    5 => false,
                ),
            6 =>
                array (
                    0 => false,
                    1 => true,
                    2 => false,
                    3 => false,
                    4 => false,
                    5 => true,
                ),
            7 =>
                array (
                    0 => false,
                    1 => true,
                    2 => true,
                    3 => false,
                    4 => false,
                    5 => true,
                ),
        );

        $this->grid = new Sidekicker\Grid($expectedGrid, 8, 6);
    }


    public function testWrapCoordinates()
    {
        $this->assertEquals(1, $this->grid->getWrappedValue(0, 0));
        $this->assertEquals(0, $this->grid->getWrappedValue(-1, 0));
        $this->assertEquals(1, $this->grid->getWrappedValue(-1, -1));
        $this->assertEquals(1, $this->grid->getWrappedValue(8, 6));
    }

    public function testLiveCount()
    {
        $this->assertEquals(2, $this->grid->countLiveNeighbours(1, 1));
        $this->assertEquals(3, $this->grid->countLiveNeighbours(0, 0));
    }

    public function testNextTick()
    {
        $this->grid->nextTick();
        $expectedArray = array (
            0 =>
                array (
                    0 => true,
                    1 => true,
                    2 => true,
                    3 => false,
                    4 => false,
                    5 => true,
                ),
            1 =>
                array (
                    0 => false,
                    1 => false,
                    2 => false,
                    3 => false,
                    4 => false,
                    5 => false,
                ),
            2 =>
                array (
                    0 => false,
                    1 => false,
                    2 => false,
                    3 => true,
                    4 => false,
                    5 => false,
                ),
            3 =>
                array (
                    0 => true,
                    1 => false,
                    2 => false,
                    3 => true,
                    4 => true,
                    5 => true,
                ),
            4 =>
                array (
                    0 => false,
                    1 => true,
                    2 => false,
                    3 => false,
                    4 => false,
                    5 => false,
                ),
            5 =>
                array (
                    0 => false,
                    1 => true,
                    2 => false,
                    3 => true,
                    4 => true,
                    5 => false,
                ),
            6 =>
                array (
                    0 => false,
                    1 => false,
                    2 => false,
                    3 => true,
                    4 => true,
                    5 => false,
                ),
            7 =>
                array (
                    0 => false,
                    1 => false,
                    2 => true,
                    3 => false,
                    4 => false,
                    5 => true,
                ),
        );

        $this->assertEquals($expectedArray, $this->grid->getGridArray());
    }
}
