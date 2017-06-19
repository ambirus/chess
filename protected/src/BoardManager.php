<?php
namespace src;

use SplObserver;
use src\figures\Figure;

class BoardManager implements \SplSubject
{
    private $_board;
    private $_figures = [];
    private $_observers;

    public function __construct(Board $board)
    {
        $this->_board = $board;
        $this->_observers = new \SplObjectStorage();
    }

    public function addFigure(Figure $figure, Coordinate $coordinates)
    {
        $placedFigure = [
            'figure' => $figure,
            'coordinates' => $coordinates
        ];
        $this->_figures[] = $placedFigure;
        $this->notify();

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

    public function attach(SplObserver $observer)
    {
        $this->_observers->attach($observer);
    }

    public function detach(SplObserver $observer)
    {
        $this->_observers->detach($observer);
    }

    public function notify()
    {
        foreach ($this->_observers as $observer) {
            $observer->update($this);
        }
    }
}