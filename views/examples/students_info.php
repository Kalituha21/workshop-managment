<?php
/**
 * @var array $insructors
 */

$insructors = [
    ['surname' => 'Giacomo', 'name' => 'Guilizzoni', 'student' => '21GD01', 'email' => 'peldi@inbox.lv', 'first' => 'A Collaborative Code Review Pl...', 'second' => 'A comparative study of hybrid...'],
    ['surname' => 'Marco', 'name' => 'Botton', 'student' => '22GD02', 'email' => 'peldi@gmail.com', 'first' => '', 'second' => ''],
    ['surname' => 'Mariah', 'name' => 'Maclachlan', 'student' => '22GD03', 'email' => 'oreon@mail.com', 'first' => 'A comparison of scrum and Knab...', 'second' => ''],
    ['surname' => 'Liberty', 'name' => 'Valerie', 'student' => '23GD04', 'email' => 'itcode@hotmail.com', 'first' => 'A comparative Study of UML To...', 'second' => 'A Comparison of Metrics for...'],
    ['surname' => '', 'name' => '', 'student' => '', 'email' => '', 'first' => '', 'second' => ''],
    ['surname' => '', 'name' => '', 'student' => '', 'email' => '', 'first' => '', 'second' => ''],

];
?>
<button type="button" class="btn btn-light">
    <img src="<?= img('import.png'); ?>" alt="Import" height="70" width="70">
    Import students
</button>
<button type="button" class="btn btn-light">
    <img src="<?= img('add_admin.png'); ?>" alt="Add Admin" height="70" width="70">
    Add Students
</button>
<button type="button" class="btn btn-light">
    <img src="<?= img('trash.png'); ?>" alt="Trash" height="70" width="70">
    Clear list of the papers
</button>
<button type="button" class="btn btn-light">
    <img src="<?= img('export.png'); ?>" alt="Export" height="70" width="70">
    Export students
</button>

<div>
<input placeholder="Information for students" id="first_name" type="text" class="validate">
<button type="button" class="btn btn-light"><img src="<?= img('check.png'); ?>" alt="Check" height="20" width="20"></button>
<button type="button" class="btn btn-light"><img src="<?= img('cross.png'); ?>" alt="Cross" height="20" width="20"></button>
</div>

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
            Student
        </div>
        <div class="col border border-dark">
            Email
        </div>
        <div class="col border border-dark">
            Paper #1
        </div>
        <div class="col border border-dark">
            Paper #2
        </div>
    </div>

    <?php foreach($insructors as $key=>$value) : ?>
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
                <?=$value['student']; ?>
            </div>
            <div class="col border border-dark">
                <?=$value['email']; ?>
            </div>
            <div class="col border border-dark">
                <?=$value['first']; ?>
            </div>
            <div class="col border border-dark">
                <?=$value['second']; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
