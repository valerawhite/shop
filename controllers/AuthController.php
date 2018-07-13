<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\BlUsers;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\Users;
use app\models\Brun;
class AuthController extends Controller 
{
public function actionLogin()
    {

      //  if (!Yii::$app->user->isGuest) {
        //    return $this->goHome();
       // }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			$id_user_p = Users::find()
			->where(['username'=>$model->username])
			->all();
			
			$id_user = $id_user_p[0]['id'];
			$cookies = Yii::$app->response->cookies;
			$cookies->add(new \yii\web\Cookie([
			'name' => 'identificator',
			'value' => $id_user,
			]));
	
	
			$cookies = Yii::$app->request->cookies;
            return $this->goBack();
        }
		$this->view->params['flag'] = 2;
		$alls = $this->view->params['brun'] = 
		Brun::find()->all();
		$this->view->params['colvo'] = 
		Brun::find()->count();
		
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
public function actionSignup() {
	$model = new SignupForm();
	$this->view->params['flag'] = 2;
		$alls = $this->view->params['brun'] = 
		Brun::find()->all();
		$this->view->params['colvo'] = 
		Brun::find()->count();
	if(Yii::$app->request->isPost) {
		$ss = $model->load(Yii::$app->request->post());
		if($model->signup()) {
		return $this->redirect(['login']);
		}
	}
	
	return $this->render('signup', [
	'model'=>$model,
	]);
}
    /**
     * Logout action.
     *
     * @return Response
     */
  public function actionLogout()
    {
		$cookies = Yii::$app->response->cookies;
		$cookies->remove('identificator');
        Yii::$app->user->logout();

        return $this->goHome();
    }


	
}
?>