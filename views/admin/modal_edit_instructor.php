<?php

use app\models\User;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/**
 * @var User $model
 */
?>

<?php
$form = ActiveForm::begin(
    ['id' => 'instructor-form', 'enableAjaxValidation' => true]
);
?>
<div class="modal-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
</div>
<div class="modal-footer">
    <?php echo Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
<?php ActiveForm::end(); ?>

