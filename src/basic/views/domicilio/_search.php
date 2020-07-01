<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DomicilioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="domicilio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'calle') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'ciudad') ?>

    <?= $form->field($model, 'provincia') ?>

    <?php // echo $form->field($model, 'codPostal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
