<?php

namespace classes;

class Champion extends ClassesAdapter
{
    /** @var Table  */
    private static $_table;
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
        self::$_table = new Table('lg_champion');
    }
    
    public static function findByName($name)
    {
        $table   = new Table('lg_champion');
        $content = $table->getTableContent(['name' => $name])[0];
        return new static($content[0], $content[1], $content[2]);
    }
    
    public static function getChampions()
    {
        $table     = new Table('lg_champion');
        $content   = $table->getTableContent([], [], 'name');
        $champions = [];
        foreach ($content as $champ) {
            $champions[] = new static($champ[0], $champ[1], $champ[2]);
        }
        return $champions;
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
}
