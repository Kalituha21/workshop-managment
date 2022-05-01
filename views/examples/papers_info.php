<?php
/**
 * @var array $insructors
 */

$insructors = [
    ['title' => 'A Collaborative Code Review Platform for GitHub', 'Surname' => 'Guilizzoni', 'name' => 'Giacomo'],
    ['title' => 'A comopative study of hybrid models of selective', 'Surname' => 'Botton', 'name' => 'Marco'],
    ['title' => 'A comparative Study of UML Tools', 'Surname' => 'Maclachlan', 'name' => 'Mariah'],
    ['title' => 'A comparison of Metrics for UML Class Diagrams', 'Surname' => 'Valerie', 'name' => 'Liberty'],
    ['title' => 'A comparasion of scrum and Kanban for identifying', 'Surname' => 'Pure', 'name' => 'Valery'],
    ['title' => 'A Comparasion of.Security Assurance Support of Agile', 'Surname' => 'Bortelo', 'name' => 'Alex'],
    ['title' => 'A comprehensive study on state of Scrum development', 'Surname' => 'Murza', 'name' => 'Aleksander'],
    ['title' => 'A Conceotual Data Model and its Autimatic Implem...', 'Surname' => 'Komisar', 'name' => 'Aleksey'],
    ['title' => 'A framework to apply ISO-IEC29110 on SCRUM', 'Surname' => 'Pezolly', 'name' => 'Enrico'],
    ['title' => 'A Framework of Formally Verify Conformance of a ...', 'Surname' => 'Davinchy', 'name' => 'Leonardo'],
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


<div class="container mt-3">
    <div class="row bg-secondary text-white">
        <div class="col-1 border border-dark">
            Nr
        </div>
        <div class="col border border-dark">
            Edits
        </div>
        <div class="col border border-dark">
            Title of the papers
        </div>
        <div class="col border border-dark">
            Selected by (Surname)
        </div>
        <div class="col border border-dark">
            Selected by (name)
        </div>
    </div>

    <?php foreach($insructors as $key=>$value) : ?>
        <div class="row bg-light text-dark">
            <div class="col-1 border border-dark">
                <?=++$key; ?>
            </div>
            <div class="col border border-dark">
                <button type="button" class="btn btn-light"><img src="<?= img('pencil.png'); ?>" alt="Pencil" height="20" width="20"></button>
                <button type="button" class="btn btn-light" ><img src="<?= img('cross.png'); ?>" alt="Cross" height="20" width="20"></button>
                 </div>
            <div class="col border border-dark">
                <?=$value['title']; ?>
            </div>
            <div class="col border border-dark">
                <?=$value['Surname']; ?>
            </div>
            <div class="col border border-dark">
                <?=$value['name']; ?>
            </div>
        </div>
    <?php endforeach; ?>

</div>
