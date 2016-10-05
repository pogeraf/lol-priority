<?php

require_once("../classes/ClassesAdapter.php");
require_once("../classes/SqlDatabase.php");
require_once("../classes/Table.php");
require_once("../classes/Champion.php");
require_once("../classes/Priority.php");

use classes\Champion;
use classes\Priority;

$name = trim($_GET['champion']);
$name = str_replace("'", " ", $name);
if (preg_match("/^[a-zA-Z\-\s\.]+$/", $name)) {
    $champ = Champion::findByName($name);

    if (!$champ->getName()) {
        echo '["Чемпион не найден"]';
    } else {
        $chPr = Priority::getChampionPriority($champ->getName());
        $data = '[';
        if ($size = sizeof($chPr)) {
            foreach ($chPr as $key => $item) {
                $data .= '["' . $item[1] . '", "' . $item[2] . '"]';
                $data .= $key + 1 < $size ? ',' : '';
            }
        }
        $data .= ']';;
        echo $data;
    }
} else {
    echo '["НЕВАЛИДНАЯ ХЕРНЯ!"]';
}