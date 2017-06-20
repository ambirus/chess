<?php
namespace src;

class BoardSaver
{
    public static function save(BoardManager $boardManager): bool
    {
        return StorageManager::model()->save($boardManager);
    }

    public static function load()
    {
        return StorageManager::model()->load();
    }
}