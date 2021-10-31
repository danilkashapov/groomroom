<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,

//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'nickname',
            'description',
//            'category_id' =>
            [
                'attribute' => 'category_id',
                'label' => 'Категория',
                'value' => 'category.name',
            ],
            'image',
//            'status' =>
//            [
//                'attribute' => 'user_id',
//                'label' => 'Фамилия',
//                'value' => 'user.surname',
//            ],
//            [
//                'attribute' => 'user_id',
//                'label' => 'Имя',
//                'value' => 'user.name',
//            ],
//            [
//                'attribute' => 'user_id',
//                'label' => 'Отчество',
//                'value' => 'user.patronymic',
//            ],
            'status',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
