<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Applications */

$this->title = "Моя заявка";
$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="applications-view">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'nickname',
            'description',
            [
                'attribute' => 'category_id',
                'label' => 'Категория',
                'value' => $model->category->name,
            ],
            'image',
//            [
//                'attribute' => 'user_id',
//                'label' => 'Фамилия',
//                'value' => $model->user->surname,
//            ],
//            [
//                'attribute' => 'user_id',
//                'label' => 'Имя',
//                'value' => $model->user->name,
//            ],
//            [
//                'attribute' => 'user_id',
//                'label' => 'Отчество',
//                'value' => $model->user->patronymic,
//            ],
            'status',
        ],
    ]) ?>

</div>
