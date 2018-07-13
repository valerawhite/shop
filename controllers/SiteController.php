<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Category;
use app\models\Product;
use app\models\Orders;
use app\models\CartForm;
use app\models\Brun;
use app\models\ProductSearch;
use app\models\Users;
class SiteController extends Controller
{
	public $iss;
	public $brun;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
	public function actionIdentic() {
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		$all_category_not_limit = Category::find()->all();
		$model = Product::find()
		->orderBy(['date'=>SORT_DESC])
		->all();
		$this->view->params['flag'] = 1;
		$this->view->params['brun'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->andwhere(['flag' => '0'])
			->all();
	
		$this->view->params['colvo'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->andwhere(['flag' => '0'])
			->count();
			return 
			['all_category_not_limit'  => $all_category_not_limit,
			'cookie_id_user' => $cookie_id_user,
			'model' => $model,
			];
			
			
	}
    public function actionIndex()
    {	
		$iss = 0;
		$all_category = Category::find()
		->limit(3)
		->all();
		$this->actionIdentic();
	//	var_dump($this->actionIdentic());
		$sql = 'SELECT Pr.price, Cat.name_category, Pr.picture, Pr.name_product, Ord.id_order, Ord.id_product, SUM(count) FROM `orders`
		As Ord INNER JOIN product As Pr on Ord.id_product = Pr.id_product INNER JOIN category As Cat on Pr.category_id = Cat.id_cat
		GROUP BY(Ord.id_product) ORDER BY Ord.count DESC ';
		$result = Yii::$app->db->createCommand($sql)->queryAll();
		$result = ArrayHelper::Index($result,  'id_order');
        return $this->render('index', [
		'all_category'=> $all_category,
		'all_category_not_limit' => $all_category_not_limit,
		'model' => $model,
		'result' => $result,
		]);
    }
	
	public function actionDelprod($id_product) {
		$model = Brun::find()
		->where(['id_product'=>$id_product])
		->one();
		if($model->delete()) {
			return 1;
		}
		else {
			return 0;
		}
	}
	
	public function actionMain() {
		
		var_dump('id');die;
		 return $this->render('main', [
		 
		 
		 ]);
		
	}
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
		var_dump('run');die;
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
		
        return $this->render('login', [
            'model' => $model,
        ]);
    }
	public function actionCart($id_product) {
		$model = new Brun();
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		if(\Yii::$app->request->isAjax){
			$model->id_user = $cookie_id_user;
			$model->id_product = $id_product;
			if($model->save(false)) {
				return 1;
			}
			else {
				return 0;
			}
		}
	
		
	}
	public function actionBuy($id) {
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		$model = Product::findOne($id);
		$all_category_not_limit = Category::find()->all();
		$related = $model->category_id;
		$rel_limit = Product::find()
		->where(['category_id'=>$related])
		->limit(4)
		->all();	
		$this->view->params['flag'] = 2;
			$this->view->params['brun'] = 
    Brun::find()
	->where(['id_user'=>$cookie_id_user])
	->andwhere(['flag' => '0'])
	->all();
	
		$this->view->params['colvo'] = 
    Brun::find()
	->where(['id_user'=>$cookie_id_user])
	->andwhere(['flag' => '0'])
	->count();
	
		return $this->render('buy', [
		'model' => $model,
		'all_category_not_limit' => $all_category_not_limit,
		'rel_limit' => $rel_limit,
		]);
		
	}
	public function actionStore($id) {
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		$model = Product::find()
		->where(['category_id' => $id])
		->all();
		$all_category_not_limit = Category::find()->all();
		
		$this->view->params['flag'] = 2;
			$this->view->params['brun'] = 
    Brun::find()
	->where(['id_user'=>$cookie_id_user])
	->andwhere(['flag' => '0'])
	->all();
	
		$this->view->params['colvo'] = 
    Brun::find()
	->where(['id_user'=>$cookie_id_user])
	->andwhere(['flag' => '0'])
	->count();
	$sql = 'SELECT Pr.price, Cat.name_category, Pr.picture, Pr.name_product, Ord.id_order, Ord.id_product, SUM(count) FROM `orders`
		As Ord INNER JOIN product As Pr on Ord.id_product = Pr.id_product INNER JOIN category As Cat on Pr.category_id = Cat.id_cat
		GROUP BY(Ord.id_product) ORDER BY Ord.count DESC LIMIT 3';
		$result = Yii::$app->db->createCommand($sql)->queryAll();
		$result = ArrayHelper::Index($result,  'id_order');
		return $this->render('store', [
		'model' => $model,
		'all_category_not_limit' => $all_category_not_limit,
		'result' => $result,
		]);
	}
	public function actionOrder($id_product) {
		
		$models = new Orders();
		
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		
		if(\Yii::$app->request->isAjax){
			$models->id_user = $cookie_id_user;
			$models->id_product = $id_product;
			$models->count = '1';
			if($models->save(false)) {
				$model = Brun::updateAll(['flag' => 1], 'id_user=' . $cookie_id_user);
				return 1;
			}
			else {
				return 0;
			}
		}

	}
	public function actionCheckout() {
		$model = new Users();
		$cookies = Yii::$app->request->cookies;
		$cookie_id_user = $cookies->getValue('identificator');
		if ($model->load(Yii::$app->request->post())) {
			$models = Users::find()
			->where(['id' => $cookie_id_user])
			->one();
			$models->save(false);		
		}
		$all_category_not_limit = Category::find()->all();
		$this->view->params['flag'] = 2;
		
			$this->view->params['brun'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->andwhere(['flag' => '0'])
			->all();
		$this->view->params['colvo'] = 
			Brun::find()
			->where(['id_user'=>$cookie_id_user])
			->andwhere(['flag' => '0'])
			->count();
		return $this->render('checkout', [
			'all_category_not_limit' => $all_category_not_limit,
			'model' => $model,
		]);
	}

  
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

  
    public function actionAbout()
    {
        return $this->render('about');
    }
}
