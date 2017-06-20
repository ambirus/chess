<?php
namespace src\storages;

class RedisStorage extends Storage
{
    public function save($data)
    {
        echo 'Saved in Redis' . "\n";
        return true;
    }

    public function load()
    {
        echo 'Loaded from Redis' . "\n";
        return 'boardManager';
    }
}