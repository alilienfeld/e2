<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project 1</title>
</head>

<body>
    <h2>Game Mechanics</h2>
    <ul>
        <li>Player 1 picks a card then chooses if the next card will be high or low</li>
        <li>Ties count as a win for the player</li>
        <li>Player 1 plays until they lose</li>
        <li>Player 2 then plays the same game</li>
        <li>The player with the longest winning streak is the winner</li>
    </ul>
    <h2>Results</h2>
    <ul>
        <li>Player 1 had streak of <?php echo $player_1_wins?> correct guesses</li>
        <li>Player 2 had a streak of <?php echo $player_2_wins?> correct guesses</li>
        <li>The winner is: <?php echo $winner?></li>
    </ul>

</body>

</html>