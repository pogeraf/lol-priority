<?php
require_once("classes/ClassesAdapter.php");
require_once("classes/SqlDatabase.php");
require_once("classes/Table.php");
require_once("classes/Champion.php");
?>
<html>
<head>
    <title></title>
    <script src="js/site.js"></script>
</head>
<body>
<div id="body">
    <?php $champions = \classes\Champion::getChampions(); ?>
    <?php if (!empty($champions)): ?>
        <select class="champion" from="champion">
        <?php foreach ($champions as $champion): ?>
                <option value="<?= $champion->getName() ?>"><?= $champion->getName() ?></option>
        <?php endforeach; ?>
        </select>
    <?php else: ?>
        <p>Не удалось получить чемпионов.</p>
    <?php endif; ?>
    <span onclick="getPriority()">Отправить</span>
    <br><span onclick="clearOutput()" class="cl-btn" hidden>Очистить</span>
</div>
<div id="output"></div>
</body>
</html>
