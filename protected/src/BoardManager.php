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

    public function addFigure(Figure $figure, Coordinate $coordinates): Figure
    {
        $this->_figures[] = [
            'figure' => $figure,
            'coordinates' => $coordinates
        ];

        $this->_checkAllowedMove($coordinates);

        return $figure;
    }

    public function moveFigure(Figure $figure, Coordinate $newCoordinates)
    {
        foreach ($this->_figures as $k => $_figure) {
            if ($_figure['figure'] == $figure) {
                $this->_figures[$k]['coordinates'] = $newCoordinates;
            }
        }

        $this->_checkAllowedMove($newCoordinates);
    }

    public function removeFigure(Figure $figure)
    {
        foreach ($this->_figures as $k => $_figure) {
            if ($_figure['figure'] == $figure) {
                unset($this->_figures[$k]);
            }
        }
    }

    public function getFigures(): array
    {
        return $this->_figures;
    }

    private function _checkAllowedMove(Coordinate $coordinates): void
    {
        if (sizeof($this->_figures) == $this->_board->getSize())
            throw new \Exception('The board is full already!');

        $countExists = 0;

        foreach ($this->_figures as $k => $_figure) {

            if ($_figure['coordinates'] == $coordinates)
                $countExists++;

            if ($countExists > 1)
                throw new \Exception('Cell ' . $coordinates->get() . ' is occupied!');

        }

    }
}