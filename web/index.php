<?php

ini_set("display_errors", "1");
require_once '..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use src\Board;
use src\observers\FigureObserver;
use src\observers\KingObserver;
use src\Coordinate;
use src\BoardManager;
use src\BoardSaver;
use src\figures\King;
use src\figures\Queen;
use src\figures\Pawn;

try {

    $boardManager = new BoardManager(new Board());
    $observer1 = new FigureObserver();
    $boardManager->attach($observer1);
    $observer2 = new KingObserver();
    $boardManager->attach($observer2);

    $king = $boardManager->addFigure(new King(), new Coordinate(4, 1));
    $queen = $boardManager->addFigure(new Queen(), new Coordinate(5,1));

    $boardManager->moveFigure($king, new Coordinate(5, 5));
    $boardManager->removeFigure($king);

    $pawn = $boardManager->addFigure(new Pawn(), new Coordinate(5,2));

    (new BoardSaver())->save($boardManager);

    $boardManager = (new BoardSaver())->load();


} catch (Exception $e) {
    echo $e->getMessage()."\n";
}