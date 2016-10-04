<?php

namespace classes\database;

use classes\ClassesAdapter;

abstract class Connector extends ClassesAdapter
{
    const HOST     = '192.168.0.199';
    const USER     = 'root';
    const PASSWORD = 'toor';
    const DATABASE = 'league';
    
    public final static function createConnection()
    {
        return new \mysqli(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
    }
}
