<?php

namespace app\module\admin\controllers;

use Yii;
use app\models\category;
use app\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Brun;

/**
 * CategoryController implements the CRUD actions for category model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all category models.
     * @return mixed
     */
    public function actionIndex()
    {
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		$this->view->params['flag'] = 1;
		$this->view->params['brun'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->all();
		$this->view->params['colvo'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->count();
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single category model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		$this->view->params['flag'] = 1;
		$this->view->params['brun'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->all();
		$this->view->params['colvo'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->count();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		$this->view->params['flag'] = 1;
		$this->view->params['brun'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->all();
		$this->view->params['colvo'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->count();
        $model = new category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cat]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		$this->view->params['flag'] = 1;
		$this->view->params['brun'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->all();
		$this->view->params['colvo'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->count();
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cat]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
