<?php
namespace src;

class Board
{
    private $_size = 8;

    public function __construct($size = null)
    {
        if ($size !== null)
            $this->_size = $size;
    }

    public function getSize()
    {
        return $this->_size;
    }
}