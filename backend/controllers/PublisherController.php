<?php

namespace backend\controllers;

use backend\models\Publishers;
use backend\models\PublishersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PublisherController implements the CRUD actions for Publishers model.
 */
class PublisherController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Publishers models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PublishersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publishers model.
     * @param int $publisher_id Publisher ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($publisher_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($publisher_id),
        ]);
    }

    /**
     * Creates a new Publishers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Publishers();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'publisher_id' => $model->publisher_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Publishers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $publisher_id Publisher ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($publisher_id)
    {
        $model = $this->findModel($publisher_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'publisher_id' => $model->publisher_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Publishers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $publisher_id Publisher ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($publisher_id)
    {
        $this->findModel($publisher_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Publishers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $publisher_id Publisher ID
     * @return Publishers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($publisher_id)
    {
        if (($model = Publishers::findOne(['publisher_id' => $publisher_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
