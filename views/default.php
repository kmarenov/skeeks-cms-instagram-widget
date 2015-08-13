<?php
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\instagram\photos */

foreach ($widget->data["data"] as $item) {
    echo "<img src='" . $item["images"]["thumbnail"]["url"] . "'>";
}
?>