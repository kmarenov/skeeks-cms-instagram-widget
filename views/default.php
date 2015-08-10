<?php
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\instagram\photos */
?>

<? if ($widget->apiId) : ?>
    <?
    $this->registerJs(<<<JS
        VK.init({apiId: {$widget->apiId}, onlyWidgets: true});
        VK.Widgets.Comments("{$widget->id}", {$widget->getJsonOptions()});
JS
    );
    ?>
    <div id="<?= $widget->id; ?>"></div>
<? endif; ?>