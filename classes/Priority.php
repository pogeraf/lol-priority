<?php

namespace classes;

class Priority extends ClassesAdapter
{    
    public static function getChampionPriority($championName) 
    {
        $tbl =
            "SELECT
               lc.name       AS champion,
               lp.name       AS priority,
               lcp.comment   AS situation
             FROM lg_champion_priority   lcp
             LEFT JOIN lg_champion       lc  ON lc.champion_id = lcp.champion_id
             LEFT JOIN lg_priority       lp  ON lp.priority_id = lcp.priority_id";
        $table = new Table($tbl, true);
        return $table->getTableContent(['champion' => $championName]);
    }
}
