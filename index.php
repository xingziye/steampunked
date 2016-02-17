<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Steampunked</title>
    <link href="project1.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div class="screen">
    <p><img src="images/title.png"></p>
    <form method="post" action="game.php">
        <fieldset>
            <legend>Game Preferences</legend>
            <p>
                <label for="player1"> Player 1 Name:</label>
                <input type="text" name="player1" id="player1">
            </p>
            <br>
            <p>
                <label for="player2"> Player 2 Name:</label>
                <input type="text" name="player2" id="player2">
            </p>
            <br>
            <p>
                <label for="6x6">6x6</label>
                <input type="radio" name="gamesize" id="6x6">
                <label for="10x10">10x10</label>
                <input type="radio" name="gamesize" id="10x10">
                <label for="20x20">20x20</label>
                <input type="radio" name="gamesize" id="20x20">
            </p>
            <br>
            <p>
                <input type="submit" >
            </p>
        </fieldset>
    </form>
</div>



</body>
</html>