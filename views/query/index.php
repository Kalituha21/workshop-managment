<?php
/**
 * @var QueryData[] $data
 * @var string[] $errors
 */

use app\structures\QueryData;
use yii\bootstrap4\Html;

?>
    <h1>Queries</h1>
    <?php foreach ($errors as $error): ?>
        <p class="text-danger"><?= $error ?></p>
    <?php endforeach; ?>

    <?= Html::a('Run all', '/query/run-all', ['class' => 'btn btn-success']) ?>
    <?= Html::a('Revert all', '/query/revert-all', ['class' => 'btn btn-danger']) ?>
    <?= Html::a('Revert last', '/query/revert-last', ['class' => 'btn btn-danger']) ?>
    <ul>
        <?php foreach ($data as $queryData): ?>
            <li>
                <?= $queryData->name ?> &nbsp;
                <?php if($queryData->isCompleted): ?>
                <span class="bg-success">Completed</span>
                <?php else: ?>
                <span class="bg-warning">Not executed</span>
                <?php endif; ?>
                <button
                        class="btn btn-primary"
                        type="button"
                        data-toggle="collapse"
                        data-target="#<?= $queryData->name ?>"
                        aria-expanded="false"
                        aria-controls="<?= $queryData->name ?>"
                >
                    SQL
                </button>
            </li>
            <div class="collapse" id="<?= $queryData->name ?>">
                <div class="card card-body">
                    <?= nl2br($queryData->sql) ?>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    </ul>