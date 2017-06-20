<?php
namespace src;

class StorageManager
{
    private $_instance;

    public function __construct($typeStorage = 'file')
    {
        $className = 'src\\storages\\' . ucfirst($typeStorage) . 'Storage';

        if (class_exists($className) === false)
            throw new \Exception('No class for selected storage!: ' . $typeStorage);

        $this->_instance = new $className;
    }

    public function save($data)
    {
        return $this->_instance->save($data);
    }

    public function load()
    {
        return $this->_instance->load();
    }
}