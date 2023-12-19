<?php
require __DIR__.'/vendor/autoload.php';

use RPS\Game;
use App\Debug;

$game = new Game();

# Each invocation of the `play` method will play and track a new round of player (given move) vs. computer
session_start();
#$game->play('rock');

#Test Debug
if ($_SESSION['results']) {
    $results = $game->play($_SESSION['results']);
}


require 'index-view.php';