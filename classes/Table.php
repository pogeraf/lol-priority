<?php

namespace classes;

class Table extends SqlDatabase
{
    /** @var \mysqli  */
    private $_connector;
    /** @var  string */
    private $_table;
    private $_much;

    function __construct($table, $much = false)
    {
        try {
            $this->_connector = self::createConnection();
            $this->_table     = $table;
            $this->_much      = $much;
        } catch (\Exception $e) {
            $this->addError($e->getMessage(), 'connection');
        }
    }

    public function getTableContent($params = [], $columns = [])
    {
        $where = "";
        if (!empty($params)) {
            foreach ($params as $key => $param) {
                $whereParams[] = " t.{$key} = \"{$param}\" ";
            }
            $where = " WHERE " . implode(" AND ", $whereParams);
        }
        $cols  = empty($columns) ? " * " : implode(", ", $columns);
        $table = $this->_much ? "({$this->_table})" : $this->_table;
        $query = "SELECT {$cols} FROM {$table} t {$where}";
        $res   = $this->_connector->query($query);

        if ($res === false) {
            $this->addError("Unknown table {$this->_table}");
        } else {
            $result = $res->fetch_all();
        }
        if ($err = $this->_connector->error) {
            $this->addError($err);
        }
        
        return !$this->hasErrors() ? $result : false;
    }
}
