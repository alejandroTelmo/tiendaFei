<?php

namespace app\modules\apiv1\controllers;

use yii;
use app\models\ClienteSearch;
use yii\rest\ActiveController;

/**
 * cliente controller for the `apiv1` module
 */
class ClienteController extends ActiveController
{
  public $modelClass='app\modules\apiv1\models\Cliente';

  public function behaviors()
  {
      return \yii\helpers\ArrayHelper::merge([
                  [
                      'class' => \yii\filters\Cors::className(),
                      'cors' => [
                          'Origin' => ['*'],
                          'Access-Control-Allow-Headers' => ['Content-Type']
                      ],
                  ],
                      ], parent::behaviors());
  }


public function actions()
{
  $actions =parent::actions();
  $actions['index']['prepareDataProvider']=[$this,'prepareDataProvider'];

  return $actions;
}

public function prepareDataProvider()
{
  $searchModel = new \app\models\ClienteSearch();
  $dataProvider=$searchModel->search(\Yii::$app->request->queryParams);

  return $dataProvider;

}


}
