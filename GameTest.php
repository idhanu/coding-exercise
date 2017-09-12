<?php
require_once 'Sidekicker/Game.php';
require_once 'Sidekicker/Grid.php';

use PHPUnit\Framework\TestCase;
use Sidekicker\Game;
/**
 * @covers Game
 */
final class GameTest extends TestCase
{
    /**
     * @expectedException Exception
     */
    public function testInvalidFilePath()
    {
        $game = new Game("invalid.txt");
        $game->start();
    }

    /**
     * @expectedException Exception
     */
    public function testInvalidFileRows()
    {
        $game = new Game("TestData/invalid_file.txt");
        $game->start();
    }

    public function testValidFile()
    {
        $game = new Game("TestData/valid_file.txt");
        $game->start();
        $grid = $game->getGrid();
        $this->assertEquals(8, $grid->getSizeX());
        $this->assertEquals(6, $grid->getSizeY());

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

        $this->assertEquals($expectedGrid, $grid->getGridArray());
    }
}
