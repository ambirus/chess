<?php
namespace src;

use SplObserver;
use src\figures\Figure;

class BoardManager implements \SplSubject
{
    private $_board;
    private $_figures = [];
    private $_observers = [];
    private $_lastAdded;

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
        $this->_lastAdded = $figure->getName();

        $this->notify();

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

    public function attach(SplObserver $observer)
    {
        $this->_observers[] = $observer;
    }

    public function detach(SplObserver $observer)
    {
        $key = array_search($observer,$this->_observers, true);

        if (false !== $key) {
            unset($this->_observers[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->_observers as $value) {
            $value->update($this);
        }
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

    public function getLastAdded(): string
    {
        return $this->_lastAdded;
    }
}