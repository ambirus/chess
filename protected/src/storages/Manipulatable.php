<?php
namespace src\storages;

interface Manipulatable
{
    public function save();
    public function load();
}