<?php
namespace src;

use src\storages\Storage;

class StorageManager
{
    public static function model($typeStorage = 'file'): Storage
    {
        $className = 'src\\storages\\' . ucfirst($typeStorage) . 'Storage';

        if (class_exists($className) === false)
            throw new \Exception('No class for selected storage!: ' . $typeStorage);

        return new $className;
    }
}