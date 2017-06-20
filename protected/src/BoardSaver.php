<?php
namespace src;

class BoardSaver
{
    public function save(BoardManager $boardManager): bool
    {
        return StorageManager::model()->save($boardManager);
    }

    public function load()
    {
        return StorageManager::model()->load();
    }
}