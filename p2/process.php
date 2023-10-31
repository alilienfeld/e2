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
$winner = ($answer == $guess or $answer == 'tie') ? true : false;

$_SESSION['results'] = [
    'Drawn' => $_SESSION['pick'],
    'Next' => $_SESSION['next'],
    'Guess' => $guess,
    'Winner' => $winner,
    'Answer' => $answer
];

header('Location: index.php');