<?php

namespace app\controllers;

use Yii;
use app\models\CompraProducto;
use app\models\CompraproductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraproductoController implements the CRUD actions for CompraProducto model.
 */
class CompraproductoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CompraProducto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraproductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CompraProducto model.
     * @param integer $compra_id
     * @param integer $producto_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($compra_id, $producto_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($compra_id, $producto_id),
        ]);
    }

    /**
     * Creates a new CompraProducto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CompraProducto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CompraProducto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $compra_id
     * @param integer $producto_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($compra_id, $producto_id)
    {
        $model = $this->findModel($compra_id, $producto_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'compra_id' => $model->compra_id, 'producto_id' => $model->producto_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CompraProducto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $compra_id
     * @param integer $producto_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($compra_id, $producto_id)
    {
        $this->findModel($compra_id, $producto_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CompraProducto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $compra_id
     * @param integer $producto_id
     * @return CompraProducto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($compra_id, $producto_id)
    {
        if (($model = CompraProducto::findOne(['compra_id' => $compra_id, 'producto_id' => $producto_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
