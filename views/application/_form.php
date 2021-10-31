<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Applications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Categoryes::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
<!--    --><?//= $form->field($model, 'imageFile')->fileInput() ?>

<!--    --><?//= $form->field($model, 'status')->dropDownList([ 'Обработка данных' => 'Обработка данных', 'Услуга оказана' => 'Услуга оказана', ], ['prompt' => '']) ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
