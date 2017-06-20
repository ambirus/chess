<?php
namespace src\storages;

interface Manipulatable
{
    public function save($data);
    public function load();
}