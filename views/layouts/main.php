<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\models\User;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$menuBarItems = [
    [
        'label' => 'Home (ex)',
        'url' => ['/site/index'],
        'allowed_guests' => true,
        'allowed_roles' => [],
    ],
    [
        'label' => 'About (ex)',
        'url' => ['/site/about'],
        'allowed_guests' => true,
        'allowed_roles' => [],
    ],
    [
        'label' => 'Contact (ex)',
        'url' => ['/site/contact'],
        'allowed_guests' => true,
        'allowed_roles' => [],
    ],
    [
        'label' => 'Queries',
        'url' => ['/query/index'],
        'allowed_guests' => true,
        'allowed_roles' => [],
    ],
    [
        'label' => 'Instructors',
        'url' => ['/admin/instructors'],
        'allowed_guests' => false,
        'allowed_roles' => [User::ROLE_ADMIN],
    ],
    [
        'label' => 'Students',
        'url' => ['/examples/student'],
        'allowed_guests' => false,
        'allowed_roles' => [User::ROLE_ADMIN, User::ROLE_INSTRUCTOR],
    ],
    [
        'label' => 'Papers',
        'url' => ['/examples/papers'],
        'allowed_guests' => false,
        'allowed_roles' => [User::ROLE_ADMIN, User::ROLE_INSTRUCTOR, User::ROLE_STUDENT],
    ],
    [
        'label' => 'Studentu_Info',
        'url' => ['/examples/sinfo'],
        'allowed_guests' => false,
        'allowed_roles' => [],
    ],
    [
        'label' => 'Profile',
        'url' => ['#'],
        'allowed_guests' => false,
        'allowed_roles' => [],
    ],
];


$items = [];
foreach ($menuBarItems as $item) {
    if (Yii::$app->user->isGuest && !$item['allowed_guests']) {
        continue;
    }
    if ($item['allowed_roles'] && !in_array(Yii::$app->user->identity->role, $item['allowed_roles'])) {
        continue;
    }

    $items[] = ['label' => $item['label'], 'url' => $item['url']];
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),

            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Queries', 'url' => ['/query/index']],
            ['label' => 'Instructors', 'url' => ['/admin/instructors']],
            ['label' => 'Student', 'url' => ['/examples/student']],
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
