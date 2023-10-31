<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project 2 High or Low</title>
    <link href='/styles.css' rel='stylesheet'>
</head>

<body>
    <h2>Insturctions</h2>
    <ul>
        <li>The computer will pull a random card from a standard deck
        </li>
        <li>Ties count as a win for the player because we are not playing casino rules.</li>
        <li>Aces are represented with 1, Jacks are 11, Queens are 12, and Kings are 13.</li>
        <li>There are no suits but there is a full deck of cards, so four of each card.</li>
        <li>Player should pick if the next card will be high or low</li>
        <li>The next card will be drawn by the computer</li>
        <li>If they player guesses right they will if they guess wrong they lose</li>
    </ul>
    <h2>Game Play</h2>
    <form action='process.php' method='POST'>
        <label for='guess'>Will the next card be higher or lower than <?php echo $chosen_card ?> ?</label>
        <select id='guess' name='guess'>
            <option>high</option>
            <option>low</option>
        </select>
        <button type='submit'>Submit</button>
    </form>
    <h2>Results</h2>
    <ul class='results'>
        <?php if (isset($results)) { ?>
        <li><?php echo $drawn_card ?> was chosen.</li>
        <li>You guessed <?php echo $guess ?> for the next card.</li>
        <li>The next card was <?php echo $next_draw ?></li>
        <li>The answer is <?php echo $answer ?>.</li>
        <?php if ($winner) { ?>
        <li>You win!</li>
        <?php } else { ?>
        <li>You lose!</li>
        <?php } ?>
        <?php } ?>
    </ul>
</body>

</html>