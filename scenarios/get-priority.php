<?php

require_once("../classes/ClassesAdapter.php");
require_once("../classes/SqlDatabase.php");
require_once("../classes/Table.php");
require_once("../classes/Champion.php");
require_once("../classes/Priority.php");

use classes\Champion;
use classes\Priority;

$name = trim($_POST['champion']);
if ($name) {
    if (preg_match("/^[a-zA-Z\-\s\.\']+$/", $name)) {
        $champ = Champion::findByName($name);
        if (!$champ->getName()) {
            echo '["Чемпион не найден"]';
        } else {
            $chPr = Priority::getChampionPriority($champ->getName());
            $data = '[';
            if ($size = sizeof($chPr)) {
                foreach ($chPr as $key => $item) {
                    $data .= '["' . $champ->getName() . '","' . $item[1] . '","' . $item[2] . '"]';
                    $data .= $key + 1 < $size ? ',' : '';
                }
            }
            $data .= ']';;
            echo $data;
        }
    } else {
        echo '["НЕВАЛИДНАЯ ХЕРНЯ!"]';
    }
} else {
    echo '["Введите мия чемпиона."]';
}