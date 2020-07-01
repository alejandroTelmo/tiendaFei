<?php

namespace app\controllers;

use Yii;
use app\models\ClienteDomicilio;
use app\models\ClienteDomicilioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientedomicilioController implements the CRUD actions for ClienteDomicilio model.
 */
class ClientedomicilioController extends Controller
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
     * Lists all ClienteDomicilio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClienteDomicilioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ClienteDomicilio model.
     * @param integer $cliente_id
     * @param integer $domicilio_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cliente_id, $domicilio_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cliente_id, $domicilio_id),
        ]);
    }

    /**
     * Creates a new ClienteDomicilio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ClienteDomicilio();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cliente_id' => $model->cliente_id, 'domicilio_id' => $model->domicilio_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ClienteDomicilio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $cliente_id
     * @param integer $domicilio_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cliente_id, $domicilio_id)
    {
        $model = $this->findModel($cliente_id, $domicilio_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cliente_id' => $model->cliente_id, 'domicilio_id' => $model->domicilio_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ClienteDomicilio model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $cliente_id
     * @param integer $domicilio_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cliente_id, $domicilio_id)
    {
        $this->findModel($cliente_id, $domicilio_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClienteDomicilio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $cliente_id
     * @param integer $domicilio_id
     * @return ClienteDomicilio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cliente_id, $domicilio_id)
    {
        if (($model = ClienteDomicilio::findOne(['cliente_id' => $cliente_id, 'domicilio_id' => $domicilio_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
