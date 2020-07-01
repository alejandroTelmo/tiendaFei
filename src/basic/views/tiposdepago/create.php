<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TiposDePago */

$this->title = 'Create Tipos De Pago';
$this->params['breadcrumbs'][] = ['label' => 'Tipos De Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipos-de-pago-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
