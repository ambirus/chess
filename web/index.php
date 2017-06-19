<?php

ini_set("display_errors", "1");
require_once '..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use src\Board;
use src\figures\King;
use src\figures\Queen;

try {

    $board = new Board();
    $king = new King();
    $queen = new Queen();


} catch (Exception $e) {
    echo $e->getMessage()."\n";
}