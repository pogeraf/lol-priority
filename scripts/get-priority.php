<?php

require_once("../classes/ClassesAdapter.php");
require_once("../classes/SqlDatabase.php");
require_once("../classes/Table.php");
require_once("../classes/Champion.php");
require_once("../classes/Priority.php");

use classes\Champion;
use classes\Priority;

$name  = $_GET['champion'];

$champ = Champion::findByName($name);
if (!$champ->getName()) {
    echo "Чемпион не найден";
} else {
    $chPr = Priority::getChampionPriority($champ->getName());
    $data = '[';
    foreach ($chPr as $item) {
        $data .= '[\'' . $item[1] . '\', \'' . $item[2] . '\']';
        $data .= ',';
    }
    $data .= ']';
    ;
    echo $data;
}