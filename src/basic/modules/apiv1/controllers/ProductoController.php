<?php

namespace app\modules\apiv1\controllers;

use yii\rest\ActiveController;

/**
 * producto controller for the `apiv1` module
 */
class ProductoController extends ActiveController
{
  public $modelClass='app\modules\apiv1\models\Producto';

 /**
     * @inheritdoc
     */
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
}
