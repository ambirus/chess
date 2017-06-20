<?php
namespace src\observers;

class KingObserver implements \SplObserver
{
    public function update(\SplSubject $subject)
    {
        if ($subject->getLastAdded() == 'King')
            echo 'King was added on the board!' . "\n";
    }
}