<?php
/**
 * @var array $insructors
 */

$insructors = [
        ['surname' => 'Giacomo', 'name' => 'Guilizzoni', 'email' => 'guilizzoni@gmail.com'],
        ['surname' => 'Marco', 'name' => 'Polli', 'email' => 'polli@gmail.com'],
        ['surname' => 'Mia', 'name' => 'Farfalle', 'email' => 'farfalle@gmail.com'],
        ['surname' => 'Roberto', 'name' => 'Squallo', 'email' => 'squallo@gmail.com'],
];
?>

<button type="button" class="btn btn-light">
    <img src="<?= img('add_admin.png'); ?>" alt="Add Admin" height="70" width="70">
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
                <?=$value['email']; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
