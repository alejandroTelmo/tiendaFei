<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteDomicilio */

$this->title = 'Update Cliente Domicilio: ' . $model->cliente_id;
$this->params['breadcrumbs'][] = ['label' => 'Cliente Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cliente_id, 'url' => ['view', 'cliente_id' => $model->cliente_id, 'domicilio_id' => $model->domicilio_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliente-domicilio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
