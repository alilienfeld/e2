<?php
// Create an array of cards in a deck 
// represent ace as 1 jack-king as 11-13
$deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
shuffle($deck);
// Create an empty array of picked cards
$player_1_wins = [];
$player_2_wins = [];
// Create a start card and start with player 1
$player_turn = 'player_1';
$chosen_card = array_pop($deck);
$loss = null;

//Keep playing high low until a player loses
while ($loss == null) {
    
    // Given player best(ish) guess without counting cards based on the chosen card
    if($chosen_card > 6) {
        $player_guess = 'low';
    } else {
        $player_guess = 'high';
    }
    
    // Determine what the correct answer is compared to the chosen card
    $next_card = array_pop($deck);
    if($next_card > $chosen_card) {
        $correct_answer = 'high';
    } elseif($next_card == $chosen_card) {
        $correct_answer = 'tie';
    } else {
        $correct_answer = 'low';
    }

    // Detemine if the guess was correct and rotate turns
    if($player_guess == $correct_answer or $correct_answer == 'tie') { 
        if($player_turn == 'player_1') {
            //echo $player_turn;
            $player_1_wins[] = $chosen_card;
            $chosen_card = $next_card;
            $player_turn = 'player_2';
        } else {  
            //echo $player_turn; 
            $player_2_wins[] = $chosen_card;
            $chosen_card = $next_card;       
            $player_turn = 'player_1';
        }
    } else {
        if($player_turn == 'player_1') {
            $loss = 'Player 1';
        } else {
            $loss = 'Player 2';
        }
    }
}

if($loss == 'Player 1') {
    $winner = 'Player 2';
} else {
    $winner = 'Player 1';
}

require 'index-view.php';