<?php
namespace src;

class BoardSaver
{
    private $_manager;

    public function __construct()
    {
        $this->_manager = new StorageManager();
    }

    public function save(BoardManager $boardManager): bool
    {
        return $this->_manager->save($boardManager);
    }

    public function load()
    {
        return $this->_manager->load();
    }
}