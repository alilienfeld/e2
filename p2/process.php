<?php 
session_start();

$guess = $_POST['guess'];
if ($_SESSION['pick'] > $_SESSION['next']) {
    $answer = 'low';
} else if ($_SESSION['pick'] < $_SESSION['next']) {
    $answer = 'high';
} else {
    $answer = 'tie';
}
if ($answer == $guess or $answer == 'tie') {
    $winner = true;
} else {
    $winner = false;
}

$_SESSION['results'] = [
    'Drawn' => $_SESSION['pick'],
    'Next' => $_SESSION['next'],
    'Guess' => $guess,
    'Winner' => $winner,
    'Answer' => $answer
];

header('Location: index.php');