<?php

ini_set("display_errors", "1");
require_once '..' . DIRECTORY_SEPARATOR . 'protected' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use src\Board;
use src\Coordinate;
use src\BoardManager;
use src\BoardSaver;
use src\figures\King;
use src\figures\Queen;
use src\figures\Pawn;

try {

    $boardManager = new BoardManager(new Board());

    $king = $boardManager->addFigure(new King(), new Coordinate(4, 1));
    $queen = $boardManager->addFigure(new Queen(), new Coordinate(5,1));

    $boardManager->moveFigure($king, new Coordinate(5, 5));
    $boardManager->removeFigure($king);

    $pawn = $boardManager->addFigure(new Pawn(), new Coordinate(5,2));

    BoardSaver::save($boardManager);

    $boardManager = BoardSaver::load();


} catch (Exception $e) {
    echo $e->getMessage()."\n";
}