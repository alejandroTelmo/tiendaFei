<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Compra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'costo')->textInput() ?>

    <?= $form->field($model, 'numRemito')->textInput() ?>

    <?= $form->field($model, 'id_proveedor')->textInput() ?>

    <?= $form->field($model, 'id_tipos_pagos')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
