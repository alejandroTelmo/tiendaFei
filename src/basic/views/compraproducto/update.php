<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CompraProducto */

$this->title = 'Update Compra Producto: ' . $model->compra_id;
$this->params['breadcrumbs'][] = ['label' => 'Compra Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->compra_id, 'url' => ['view', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="compra-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
