<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteDomicilio */

$this->title = 'Create Cliente Domicilio';
$this->params['breadcrumbs'][] = ['label' => 'Cliente Domicilios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-domicilio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
