<?php
/**
 * Created by PhpStorm.
 * User: xingziye
 * Date: 2/12/16
 * Time: 1:35 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Steampunked</title>
    <link href="project1.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="container">

    <p><img src="images/title.png"></p>
    <form method="post" action="">
        <div class="game">
            <div class="row">
                <div class="cell"><img src="images/valve-closed.png"></div><div class="cell"><img src="images/straight-h.png"></div><div class="cell"><img src="images/straight-h.png"></div><div class="cell"><img src="images/straight-h.png"></div><div class="cell"><img src="images/ninety-sw.png"></div><div class="cell"><img src="images/gauge-top-0.png"></div>
            </div>
            <div class="row">
                <div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src="images/ninety-ne.png"></div><div class="cell"><img src="images/gauge-0.png"></div>
            </div>
            <div class="row">
                <div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div>
            </div>
            <div class="row">
                <div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src="images/gauge-top-0.png"></div>
            </div>
            <div class="row">
                <div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div><div class="cell"><img src="images/ninety-es.png"></div><div class="cell"><img src="images/straight-h.png"></div><div class="cell"><img src="images/gauge-0.png"></div>
            </div>
            <div class="row">
                <div class="cell"><img src="images/valve-closed.png"></div><div class="cell"><img src="images/straight-h.png"></div><div class="cell"><img src="images/straight-h.png"></div><div class="cell"><img src="images/ninety-wn.png"></div><div class="cell"><img src=""></div><div class="cell"><img src=""></div>
            </div>
        </div>
        <p class="message">Player 1, you have won!</p>
        <p class="pieces">
            <label for="radio1"><img src="images/valve-closed.png" /></label>
            <input type="radio" name="radio1" id="radio1"
            <label for="radio2"><img src="images/straight-h.png" /></label>
            <input type="radio" name="radio2" id="radio2"
            <label for="radio3"><img src="images/straight-v.png" /></label>
            <input type="radio" name="radio3" id="radio3"
            <label for="radio4"><img src="images/straight-h.png" /></label>
            <input type="radio" name="radio4" id="radio4"
            <label for="radio5"><img src="images/straight-h.png" /></label>
            <input type="radio" name="radio5" id="radio5"
        </p>
        <div class="options">
            <p class="option"><input type="button" name="rotate" value="Rotate"></p>
            <p class="option"><input type="button" name="discard" value="Discard"></p>
            <p class="option"><input type="button" name="open" value="Open Valve"></p>
            <p class="option"><input type="button" name="giveup" value="Give Up"></p>
        </div>

    </form>


</div>

</body>
</html>