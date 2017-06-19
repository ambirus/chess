<?php
namespace src\figures;

abstract class Figure
{
    protected $name;

    public function __construct()
    {
        if ($this->name === null)
            throw new \Exception('Figure name for ' . get_class($this) . ' is required!');
    }

    public function getName()
    {
        return $this->name;
    }
}