<?php
/**
 * @var array $instructors
 */

use yii\bootstrap4\Modal;

$js = <<< JS
$('#js--modal-instructor').click(function(){
    $('#modal-instructor').modal('show')
        .find('#modal-content')
        .load($(this).attr('value'));
})
JS;

$this->registerJs($js);
?>

<?php
Modal::begin([
    'id'=>'modal-instructor',
    'size'=>'modal-lg',
    'title' => 'Add Instructor',
]);

echo "<div id='modal-content'></div>";

Modal::end();

?>

<button id="js--modal-instructor" type="button" class="btn btn-light quick-add-contact" value="/admin/add-instructor">
    <img src="<?= img('add_admin.png'); ?>" alt="Add Instructor" height="70" width="70">
    Add Instructor
</button>

<div class="container mt-3">
    <div class="row bg-secondary text-white">
        <div class="col-1 border border-dark">
            Nr
        </div>
        <div class="col border border-dark">
            Edit
        </div>
        <div class="col border border-dark">
            Surname
        </div>
        <div class="col border border-dark">
            Name
        </div>
        <div class="col border border-dark">
            Email
        </div>
    </div>

    <?php foreach($instructors as $key=>$value) : ?>
        <div class="row bg-light text-dark">
            <div class="col-1 border border-dark">
                <?=++$key; ?>
            </div>
            <div class="col border border-dark">
                <button type="button" class="btn btn-light"><img src="<?= img('message.png'); ?>" alt="Message" height="20" width="20"></button>
                <button type="button" class="btn btn-light"><img src="<?= img('pencil.png'); ?>" alt="Pencil" height="20" width="20"></button>
                <button type="button" class="btn btn-light"><img src="<?= img('cross.png'); ?>" alt="Cross" height="20" width="20"></button>
                <button type="button" class="btn btn-light"><img src="<?= img('plane.png'); ?>" alt="Plane" height="20" width="20"></button>
            </div>
            <div class="col border border-dark">
                <?=$value['surname']; ?>
            </div>
            <div class="col border border-dark">
                <?=$value['name']; ?>
            </div>
            <div class="col border border-dark">
                <?=$value['email']; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>