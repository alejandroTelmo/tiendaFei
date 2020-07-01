<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteDomicilioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliente Domicilios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-domicilio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cliente Domicilio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cliente_id',
            'domicilio_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
