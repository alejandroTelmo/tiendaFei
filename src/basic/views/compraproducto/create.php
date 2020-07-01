<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CompraProducto */

$this->title = 'Create Compra Producto';
$this->params['breadcrumbs'][] = ['label' => 'Compra Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
