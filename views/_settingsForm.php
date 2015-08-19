<?php
/* @var $this yii\web\View */
use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;

?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->fieldSet('Отображение'); ?>
<?= $form->field($model, 'viewFile')->textInput(); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet('Параметры виджета'); ?>
<?= $form->field($model, 'clientId')->hint('CLIENT ID для доступа к API'); ?>
<?= $form->field($model, 'userName')->hint('Имя пользователя, фотографии которого показывать'); ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>