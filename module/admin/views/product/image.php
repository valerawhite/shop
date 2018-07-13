<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BlPosts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bl-posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'picture')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
