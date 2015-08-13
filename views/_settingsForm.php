<?php
/* @var $this yii\web\View */
use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;

?>
<?php $form = ActiveForm::begin(); ?>
<?= $form->fieldSet('Отображение'); ?>
<?= $form->field($model, 'viewFile')->textInput(); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet('Параметры виджета'); ?>
<?= $form->field($model, 'accessToken')->hint('Ваш Access Token для доступа к API Instagram'); ?>
<?= $form->fieldInputInt($model, 'userId')->hint('ID пользователя Instagram, фотографии которого нужно показывать'); ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>