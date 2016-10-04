<?php

namespace classes;

use classes\database\Connector;
use classes\database\Table;

class Priority extends ClassesAdapter
{    
    public static function getChampionPriority($championName) 
    {
        $connection = Connector::createConnection();
        return $connection->query(
            "SELECT
               lc.name       AS champion,
               lp.name       AS priority,
               lcp.comment   AS situation
             FROM lg_champion_priority   lcp
             LEFT JOIN lg_champion       lc  ON lc.champion_id = lcp.champion_id
             LEFT JOIN lg_priority       lp  ON lp.priority_id = lcp.priority_id
             WHERE lc.`name` LIKE '%{$championName}%'
             ORDER BY lcp.priority_id, lc.name"
        )->fetch_all();
    }

    public function getError($key = null)
    {
        return $key ? $this->_errors[$key] : $this->_errors;
    }
}