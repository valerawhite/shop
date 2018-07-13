<?php

namespace app\module\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Product;
use app\models\ProductSearch;
use app\models\ImageUpload;
use app\models\Category;
use app\models\Brun;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for product model.
 */
class ProductController extends Controller
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
     * Lists all product models.
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
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single product model.
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
     * Creates a new product model.
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
        $model = new product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_product]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing product model.
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
            return $this->redirect(['view', 'id' => $model->id_product]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
		public function actionSetImage($id)
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
	$model = new ImageUpload;
	if(Yii::$app->request->isPost)
	{
		$posts = $this->findModel($id);
		$file = UploadedFile::getInstance($model, 'picture');
		if($posts->saveImage($model->uploadFile($file, $posts->picture))) {
			return $this->redirect(['view', 'id'=> $posts->id_product]);
		}
	}
	 return $this->render('image', [
	 'model' => $model,
	 ]);
	}
		public function actionSetCategory($id) {
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
		$article = $this->findModel($id);
		$selectedCategory = $article->category;
		$categories = ArrayHelper::map(Category::find()->all(), 'id_cat', 'name_category');
		if(Yii::$app->request->isPost) {
			$categorie = Yii::$app->request->Post('category');
			if($article->saveCategory($categorie)) {
			return $this->redirect(['view', 'id'=>$article->id_product]);
			}
		}
		return $this->render('category', [
		'article'=>$article,
		'selectedCategory'=>$selectedCategory,
		'categories' => $categories,
		]);
	}

    /**
     * Finds the product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
