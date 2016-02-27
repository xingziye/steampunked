<?php
require 'lib/game.inc.php';
$view = new Steampunked\View($steampunked);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Steampunked</title>
    <link href="project1.css" type="text/css" rel="stylesheet" />
</head>
<body>

    <?php echo $view->createGrid(); ?>

    <p class="message"><?php echo $view->player1name(); ?>, your turn!</p>

    <?php echo $view->createRadioButtons(); ?>

    <?php echo $view->createOptionButtons(); ?>


</body>
</html>