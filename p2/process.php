<?php 
session_start();
// See what answer was submitted and figure out correct answer.
$guess = $_POST['guess'];
if ($_SESSION['pick'] > $_SESSION['next']) {
    $answer = 'low';
} else if ($_SESSION['pick'] < $_SESSION['next']) {
    $answer = 'high';
} else {
    $answer = 'tie';
}
$winner = ($answer == $guess) ? true : false;
// Count wins if winner else clear winning streak
$_SESSION['streak'] = $winner ? $_SESSION['streak'] + 1 : null;

// Send results back to use in view
$_SESSION['results'] = [
    'Drawn' => $_SESSION['pick'],
    'Next' => $_SESSION['next'],
    'Guess' => $guess,
    'Winner' => $winner,
    'Answer' => $answer,
];

header('Location: index.php');