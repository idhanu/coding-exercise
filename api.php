<?php
/**
 * Simple API interface to interact with the outside world. This can be improved to persist the current state
 */
require_once 'Sidekicker/Game.php';
require_once 'Sidekicker/Grid.php';

$gridArray = json_decode($_POST['grid']);
$grid = new \Sidekicker\Grid($gridArray, count($gridArray), count($gridArray[0]));
$grid->nextTick();
echo json_encode($grid->getGridArray());
