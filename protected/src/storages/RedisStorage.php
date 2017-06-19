<?php
namespace src\storages;

class RedisStorage extends Storage
{
    public function save()
    {
        echo 'Saved in Redis' . "\n";
    }

    public function load()
    {
        echo 'Loaded from Redis' . "\n";
    }
}