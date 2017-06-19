<?php
namespace src;

class BoardObserver implements \SplObserver
{
    private $_changed = [];

    public function update(\SplSubject $subject)
    {
        $this->_changed[]  = clone $subject;
    }

    public function getChanged(): array
    {
        return $this->_changed;
    }

}