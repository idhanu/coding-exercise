<?php
require_once 'Sidekicker/Game.php';
require_once 'Sidekicker/Grid.php';

if ($argc === 2 && is_string($argv[1])) {
    try {
        $game = new Sidekicker\Game($argv[1]);
        $game->start();

        while(1) {
            $game->showGrid();
            $game->nextTick();
            sleep(1);
        }
    } catch (\Exception $e) {
        print("ERROR: " . $e->getMessage() . "\n\n");
    }
} else {
    print("Usage: cli.php file_name \n\n");
}