<?php

use yii\helpers\Url;

function img(string $fileName): string
{
    return Url::to('@web/images/' . $fileName);
}