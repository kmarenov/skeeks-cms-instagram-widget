<?php
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\instagram\widget */
?>

<? if (!empty($widget->error_message)): ?>
    Ошибка: <?= $widget->error_message ?>
<? else: ?>
    <h2>Мы в Instagram</h2>
    <ul>
        <? foreach ($widget->media["data"] as $item): ?>
            <a href="<?= $item["link"] ?>" target="_blank">
                <img src="<?= $item["images"]["thumbnail"]["url"] ?>" height="50px" width="50px"/>
            </a>
        <? endforeach ?>
    </ul>
<?endif?>