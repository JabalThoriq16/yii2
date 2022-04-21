<?php

namespace backend\controllers;

use backend\models\Authors;
use backend\models\AuthorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AuthorsController implements the CRUD actions for Authors model.
 */
class AuthorsController extends Controller
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
     * Lists all Authors models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AuthorsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Authors model.
     * @param int $authors_id Authors ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($authors_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($authors_id),
        ]);
    }

    /**
     * Creates a new Authors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Authors();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'authors_id' => $model->authors_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Authors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $authors_id Authors ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($authors_id)
    {
        $model = $this->findModel($authors_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'authors_id' => $model->authors_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Authors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $authors_id Authors ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($authors_id)
    {
        $this->findModel($authors_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Authors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $authors_id Authors ID
     * @return Authors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($authors_id)
    {
        if (($model = Authors::findOne(['authors_id' => $authors_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
