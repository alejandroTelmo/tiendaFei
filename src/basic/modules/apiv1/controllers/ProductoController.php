<?php

namespace app\modules\apiv1\controllers;

use yii\rest\ActiveController;

/**
 * producto controller for the `apiv1` module
 */
class ProductoController extends ActiveController
{
  public $modelClass='app\modules\apiv1\models\Producto';


  public function behaviors()
  {
      $behaviors = parent::behaviors();

      // remove authentication filter
      $auth = $behaviors['authenticator'];
      unset($behaviors['authenticator']);

      // add CORS filter
     $behaviors['corsFilter'] = [
           'class' => \yii\filters\Cors::className(),
        ];

      // re-add authentication filter
      $behaviors['authenticator'] = $auth;

//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                [
//                    'class' => HttpBasicAuth::className(),
//                    'auth' => function ($username, $password) {
//                        $user = User::find()->where(['username' => $username])->one();
//                        if ($user!=null && $user->password == ($password)) {
//                            return $user;
//                        }
//                        return null;
//                    },
//                ],
////                HttpBasicAuth::class,
//                HttpBearerAuth::className(),
//                QueryParamAuth::className(),
//            ],
//        ];
      return $behaviors;
  }
}
