<?php
session_start();
// See what answer was submitted and figure out correct answer.
$play = $_POST['play'];
$_SESSION['results'] = $play;

header('Location: index.php');