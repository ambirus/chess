<?php
namespace src\storages;

class FileStorage extends Storage
{
    public function save($data)
    {
        echo 'Saved in File' . "\n";
        return true;
    }

    public function load()
    {
        echo 'Loaded from File' . "\n";
        return 'boardManager';
    }
}