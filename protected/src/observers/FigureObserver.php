<?php
namespace src\observers;

class FigureObserver implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        echo 'Figure was added on the board!' . "\n";
    }
}