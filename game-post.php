<?php
require __DIR__ . '/lib/game.inc.php';
phpinfo();
$controller = new Steampunked\Controller($steampunked, $_POST);

if($controller->isReset()) {
    unset($_SESSION[STEAMPUNKED_SESSION]);

}

//header("location: game.php");
exit;