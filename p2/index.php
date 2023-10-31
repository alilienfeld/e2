<?php
// Create an array of cards in a deck 
// represent ace as 1 jack-king as 11-13

$deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
shuffle($deck);
$chosen_card = array_pop($deck);
$next_card = array_pop($deck);
// Bring chosen card info to process page to analyze if submission is correct
session_start();
$_SESSION['pick'] = $chosen_card;
$_SESSION['next'] = $next_card;
// Counting number of wins in a row for a player
if (isset($_SESSION['streak'])) {
    $win_count = $_SESSION['streak'];
}
// Info I got back from process
if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
    $drawn_card = $results['Drawn'];
    $next_draw = $results['Next'];
    $winner = $results['Winner'];
    $guess = $results['Guess'];
    $answer = $results['Answer'];
    
    // Clear the session for next game
    $_SESSION['results'] = null;
}

require 'index-view.php';