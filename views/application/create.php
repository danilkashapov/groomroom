<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Applications */

$this->title = 'Добавление заявки';
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
