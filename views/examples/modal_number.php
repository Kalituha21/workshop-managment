<?php

use app\models\SystemMeta;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/**
 * @var SystemMeta $model
 */
?>

<?php
$form = ActiveForm::begin(['id' => 'number-form']);
?>
<div class="modal-body">
    <?= $form->field($model, 'value')->textInput(['type' => 'number']); ?>
</div>
<div class="modal-footer">
    <?php echo Html::submitButton('Change', ['class' => 'btn btn-success']) ?>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
<?php ActiveForm::end(); ?>
