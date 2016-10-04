<?php

namespace classes\database;
require_once("Connector.php");

class Table extends Connector
{
    /** @var \mysqli  */
    private $_connector;
    /** @var  string */
    private $_tableName;

    function __construct($tableName)
    {
        try {
            $this->_connector = self::createConnection();
            $this->_tableName = $tableName;
        } catch (\Exception $e) {
            $this->addError($e->getMessage(), 'connection');
        }
    }

    public function getTableContent($params = [])
    {
        $where = "";
        if (!empty($params)) {
            foreach ($params as $key => $param) {
                $whereParams[] = " {$key} = \"{$param}\" ";
            }
            $where = " WHERE " . implode(" AND ", $whereParams);
        }
        $query = $this->_connector->query(
            "SELECT * FROM {$this->_tableName} {$where}"
        );
        if ($err = $this->_connector->error) {
            $this->addError($err);
        } 
        return !$this->hasErrors() ? $query : false;
    }
    
    public function getError($key = null)
    {
        return $key ? $this->_errors[$key] : $this->_errors;
    }
}