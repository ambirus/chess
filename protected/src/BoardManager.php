<?php
namespace src;

use src\figures\Figure;

class BoardManager
{
    private $_board;
    private $_figures = [];

    public function __construct(Board $board)
    {
        $this->_board = $board;
    }

    public function addFigure(Figure $figure, Coordinate $coordinates)
    {
        $placedFigure = [
            'figure' => $figure,
            'coordinates' => $coordinates
        ];
        $this->_figures[] = $placedFigure;

        return $placedFigure;
    }

    public function moveFigure($placedFigure, Coordinate $newCoordinates)
    {
        foreach ($this->_figures as $k => $v) {
            if ($v['figure'] == $placedFigure['figure']) {
                $this->_figures[$k]['coordinates'] = $newCoordinates;
            }
        }
    }

    public function getFigures()
    {
        return $this->_figures;
    }
}