<?php

ini_set("display_errors", "1");
require_once '..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use src\Board;
use src\Coordinate;
use src\BoardManager;
use src\figures\King;
use src\figures\Queen;

try {

    $observer = new \src\BoardObserver();
    $boardManager = new BoardManager(new Board());
    $boardManager->attach($observer);

    $king = $boardManager->addFigure(new King(), new Coordinate(4, 1));
    $queen = $boardManager->addFigure(new Queen(), new Coordinate(5,1));
   // print_r($boardManager->getFigures());
    $boardManager->moveFigure($king, new Coordinate(5, 2));
   // print_r($boardManager->getFigures());

    print_r($observer->getChanged());


} catch (Exception $e) {
    echo $e->getMessage()."\n";
}