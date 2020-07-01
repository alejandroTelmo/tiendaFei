<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TiposDePago */

$this->title = 'Update Tipos De Pago: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipos De Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipos-de-pago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
