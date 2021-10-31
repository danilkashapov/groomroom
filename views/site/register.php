<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\RegisterForm */
/* @var $form ActiveForm */
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signUp">

    <h1><?= \yii\bootstrap4\Html::encode($this->title) ?></h1>

    <?php $form = \yii\bootstrap4\ActiveForm::begin([
        'id' => 'register-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'surname')->textInput(['autofocus' => true])  ?>
        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'patronymic')->textInput() ?>
        <?= $form->field($model, 'login')->textInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <div class="offset-lg-1 col-lg-11">
            <?= \yii\bootstrap4\Html::submitButton('Создать аккаунт', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-signUp -->
