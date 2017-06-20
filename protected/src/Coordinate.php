<?php
namespace src;

class Coordinate
{
    private $_x;
    private $_y;

    public function __construct($x = null, $y = null)
    {
        if ($x === null || $y === null)
            throw new \Exception('X and Y coordinates are required!');

        $this->_x = $x;
        $this->_y = $y;
    }

    public function get(): string
    {
        return $this->_x . ', ' . $this->_y;
    }
}