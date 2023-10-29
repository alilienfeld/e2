<?php
// Create an array of cards in a deck 
// represent ace as 1 jack-king as 11-13
$deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
shuffle($deck);
// Create an empty array of picked cards
$player_1_wins = [];
$player_2_wins = [];
// Create a start card and start with player 1
$player_turn = 'Player 1';
$chosen_card = array_pop($deck);
$loss = null;


//Keep playing high low until a player loses
while ($loss == null) {
    
    // Given player best(ish) guess without counting cards based on the chosen card

    $player_guess = ($chosen_card > 6) ? 'low' : 'high';
    // Determine what the correct answer is compared to the chosen card
    $next_card = array_pop($deck);
    if($next_card > $chosen_card) {
        $correct_answer = 'high';
    } elseif($next_card == $chosen_card) {
        $correct_answer = 'tie';
    } else {
        $correct_answer = 'low';
    }
    // Collect the cards dran and guesses to display.
    $results[] = [
        'Drawn Card' => $chosen_card,
        'Player guess' => $player_guess,
        'Next Card' => $next_card,
        'Correct Answer' => $correct_answer,
        'Turn' => $player_turn
    ];
    // Detemine if the guess was correct and rotate turns and the chosen card
    if($player_guess == $correct_answer or $correct_answer == 'tie') { 
        if($player_turn == 'Player 1') {
            $player_1_wins[] = $chosen_card;
            $chosen_card = $next_card;
            $player_turn = 'Player 2';
        } else {  
            $player_2_wins[] = $chosen_card;
            $chosen_card = $next_card;       
            $player_turn = 'Player 1';
        }
        // Bad guess loses game and breaks the while loop
    } else {
        $loss = ($player_turn == 'Player 1') ? 'Player 1' : 'Player 2';
    }
}
// Determine winner based on loser.

$winner = ($loss == 'Player 1') ? 'Player 2' : 'Player 1';

require 'index-view.php';