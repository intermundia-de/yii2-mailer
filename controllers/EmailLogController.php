<?php

namespace intermundia\mailer\controllers;

use Yii;
use intermundia\mailer\models\EmailLog;
use intermundia\mailer\models\EmailLogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmailLogController implements the CRUD actions for EmailLog model.
 */
class EmailLogController extends Controller
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all EmailLog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmailLogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->sort = ['defaultOrder' => ['created_at' => 'DESC']];

        $model = new EmailLog();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single EmailLog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EmailLog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EmailLog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EmailLog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EmailLog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes logs before entered date.
     * @return mixed
     */
    public function actionDeleteByDate()
    {
        $request = Yii::$app->request;
        $date = strtotime($request->post('EmailLog')['deleteDate']);
        $deleteByDate = EmailLog::deleteAll(['<', 'created_at', $date]);

        if (!$deleteByDate) {
            Yii::error('Could not delete logs');
            return $this->redirect(['index']);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the EmailLog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EmailLog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EmailLog::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
