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
<?= $form->field($model, 'userName')->hint('Имя пользователя Instagram'); ?>
<?= $form->field($model, 'tag')->hint('Тэг'); ?>
<?= $form->fieldSelect($model, 'showBy', array('user' => 'Пользователя', 'tag' => 'По тэгу')); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet('Параметры отображения'); ?>
<?= $form->field($model, 'width'); ?>
<?= $form->fieldCheckboxBoolean($model, 'isShowToolbar'); ?>
<?= $form->field($model, 'count'); ?>
<?= $form->fieldSelect($model, 'imgRes', array('thumbnail' => 'Маленькое (150x150)', 'low_resolution' => 'Средее (320x320)', 'standard_resolution' => 'Большое (640x640)')); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>