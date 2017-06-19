<?php
namespace src\storages;

class FileStorage extends Storage
{
    public function save()
    {
        echo 'Saved in File' . "\n";
    }

    public function load()
    {
        echo 'Loaded from File' . "\n";
    }
}