<?php
// + Create an array of cards in a deck 
// represent ace as 1 jack-king as 11-13
$deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
shuffle($deck);
// + Create an empty array of picked cards
$player_1_cards = [];
$player_2_cards = [];
// + Create a player choice for high or low
$player_turn = 'player_1';
$chosen_card = array_pop($deck);
$loss = null;

//Keep playing high low until the player loses
while ($loss == null) {
    
    // Given player best(ish) guess without counting cards
    if($chosen_card > 6) {
        $player_guess = 'low';
    } else {
        $player_guess = 'high';
    }
     
    $next_card = array_pop($deck);
    if($next_card > $chosen_card) {
        $correct_answer = 'high';
    } elseif($next_card == $chosen_card) {
        $correct_answer = 'tie';
    } else {
        $correct_answer = 'low';
    }
    if($player_guess == $correct_answer or $correct_answer == 'tie') {
        if($player_turn == 'player_1') {
            $player_1_cards[] = $chosen_card;
            $player_turn = 'player_2';
            $chosen_card = $next_card;
        } else {
            $player_2_cards[] = $chosen_card;
            $player_turn = 'player_1';
            $chosen_card = $next_card;
        }
    } else {
        if($player_turn == 'player_1') {
            $loss = 'player_1';
        } else {
            $loss = 'player_2';
        }
    }
}
$player_1_wins = count($player_1_cards);
$player_2_wins = count($player_2_cards);
if($player_1_wins > $player_2_wins) {
    $winner = 'Player 1';
} elseif($player_1_wins == $player_2_wins) {
    $winner = 'It is a tie!';
} else {
    $winner = 'Player 2';
}
require 'index-view.php';