<?php
$cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
shuffle($cards);

$playerCards = [];
$computerCards = [];
foreach ($cards as $key => $value) {
    if($key % 2 == 0) {
        $playerCards[] = array_pop($cards);
     } else {
        $computerCards[] = array_pop($cards);
    }
    
}
var_dump($playerCards);
var_dump($computerCards);