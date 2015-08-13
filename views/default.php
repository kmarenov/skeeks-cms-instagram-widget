<?php
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\instagram\photos */

$items = $widget->data["data"];
?>

<?if(!empty($items)):?>

<h2>Мы в Instagram</h2>

<ul>

<?foreach ($items as $item):?>
    <a href="<?=$item["link"]?>" target="_blank">
        <img src="<?=$item["images"]["thumbnail"]["url"]?>" height="50px" width="50px" />
    </a>
<?endforeach?>

</ul>

<?endif?>