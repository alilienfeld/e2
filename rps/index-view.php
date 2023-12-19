<!DOCTYPE html>
<html lang="en">

<head>
    <title>RPS</title>

</head>

<body>

    <h2>Game Play</h2>
    <form action='process.php' method='POST'>
        <input type='radio' name='play' id='rock' value='rock'><label for='rock'>Rock</label>
        <input type='radio' name='play' id='paper' value='paper'><label for='paper'>Paper</label>
        <input type='radio' name='play' id='scissors' value='scissors'><label for='scissors'>Scissor</label>
        <button type='submit' class='button'>Submit</button>
    </form>


    <h2>Results</h2>
    <?php if ($_SESSION['results']) {?>
    You picked <?php echo $_SESSION['results'] ?>
    Computer picked <?php echo $results['computer'] ?>
    <?php echo $results['outcome'] ?>
    <?php } ?>
</body>

</html>