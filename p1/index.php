<?php
// + Create an array of cards in a deck 
// represent ace as 1 jack-king as 11-13
$deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
shuffle($deck);
// + Create an empty array of picked cards
$discard_cards = [];
// + Create a player choice for high or low
$player_1 = null;
$player_2 = null;
//Keep playing high low until the player loses
while ($player_1 != 'lost') {
    $chosen_card = array_pop($deck);
    echo($chosen_card);
    // Give player best(ish) possible guess
    if ($chosen_card > 6) {
        $player_1 = 'low';
    } else {
        $player_1 = 'high';
    }
    echo($player_1);

    // + Pick next card from deck
    $next_card = array_pop($deck);
    echo($next_card);
    //Is the next card actually higher or lower than the last
    if($next_card > $chosen_card) {
        $answer = 'high';
    } elseif($next_card < $chosen_card) {
        $answer = 'low';
    } else {
        $answer = 'tie';
    }
    echo($answer);
    // + Compare if player won or lost
    if($answer == 'tie' or $answer == $player_1) {
        $discard_cards[] = $chosen_card;
    } else {
        $player_1 = 'lost';
        echo($player_1);
    }
}
$player_1_wins = count($discard_cards);
//Player 2 turn
$deck = [1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8, 8, 8, 9, 9, 9, 9, 10, 10, 10, 10, 11, 11, 11, 11, 12, 12, 12, 12, 13, 13, 13, 13];
shuffle($deck);
$discard_cards = [];
while ($player_2 != 'lost') {
    $chosen_card = array_pop($deck);

    // Give player best(ish) possible guess
    if ($chosen_card > 6) {
        $player_2 = 'low';
    } else {
        $player_2 = 'high';
    }

    // + Pick next card from deck
    $next_card = array_pop($deck);
    //Is the next card actually higher or lower than the last
    if($next_card > $chosen_card) {
        $answer = 'high';
    } elseif($next_card < $chosen_card) {
        $answer = 'low';
    } else {
        $answer = 'tie';
    }
    // + Compare if player won or lost
    if($answer == 'tie' or $answer == $player_2) {
        $discard_cards[] = $chosen_card;
    } else {
        $player_2 = 'lost';
    }
}  
    $player_2_wins = count($discard_cards);
// + Keep going until player loses then count winning streak?
if($player_1_wins > $player_2_wins) {
    $winner = 'Player 1';
} elseif($player_1_wins == $player_2_wins) {
    $winner = 'It is a tie!';
} else {
    $winner = 'Player 2';
}

require 'index-view.php';