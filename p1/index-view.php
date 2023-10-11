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
        <li>If Player 1 guesses correctly the turn switches to Player 2</li>
        <li>Player 2 the chooses based on the last card if it will be high or low</li>
        <li>The first Player to guess incorrectly loses</li>
    </ul>
    <h2>Results</h2>
    <ul>
        <?php foreach($results as $result) { ?>
        <li>On <?php echo $result['Turn'] ?> turn the card <?php echo $result['Drawn Card'] ?> was drawn.</li>
        <li><?php echo $result['Turn'] ?> guessed <b><?php echo $result['Player guess']?></b> for the next card.</li>
        <li>The next card drawn was <?php echo $result['Next Card']?> so the correct answer was
            <b><?php echo $result['Correct Answer']?></b>
        </li>
        <?php }?>
        <li>Player 1 had streak of <?php echo count($player_1_wins)?> correct guesses</li>
        <li>Player 2 had a streak of <?php echo count($player_2_wins)?> correct guesses</li>
        <li><?php echo $loss?> guessed wrong first</li>
        <li>The winner is: <?php echo $winner?></li>
    </ul>

</body>

</html>