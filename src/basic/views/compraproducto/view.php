<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CompraProducto */

$this->title = $model->compra_id;
$this->params['breadcrumbs'][] = ['label' => 'Compra Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compra-producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id], [
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
            'compra_id',
            'producto_id',
            'cantidad',
            'costo',
        ],
    ]) ?>

</div>
