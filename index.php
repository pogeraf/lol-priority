<?php

require_once("classes/Champion.php");
require_once("classes/Priority.php");

use classes\Champion;
use classes\Priority;

$champ = Champion::findByName('Ashe');

if (!$champ->getName()) {
    echo "Чемпион не найден";
} else {
    echo '<pre>'; var_dump(Priority::getChampionPriority($champ->getName()));
}