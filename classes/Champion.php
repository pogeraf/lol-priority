<?php

namespace classes;
require_once("ClassesAdapter.php");
require_once("database/Table.php");

use classes\database\Table;

class Champion extends ClassesAdapter
{
    /** @var Table  */
    private $_table;
    /** @var  integer */
    private $_id;
    /** @var string  */
    private $_name;
    /** @var  string */
    private $_info;
    
    function __construct($id, $name, $info = null)
    {
        $this->_id    = $id;
        $this->_name  = $name;
        $this->_info  = $info;
        $this->_table = new Table('lg_champion');
    }
    
    public static function findByName($name)
    {
        $table   = new Table('lg_champion');
        $content = $table->getTableContent(['name' => $name])->fetch_row();
        return !$table->hasErrors() ? new static($content[0], $content[1], $content[2]) : false;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->_info;
    }

    public function getError($key = null)
    {
        return $key ? $this->_errors[$key] : $this->_errors;
    }
}