<?php
namespace app\components;
use app\models\Brun;
use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $message;
	public $model;
	public $brun;

    public function init()
    {
        parent::init();
			$brun = Brun::find()->all();
           
        
    }

    public function run()
    {
        return  $this->render('main',[
			'brun' => $brun,
		]);
    }
}
?>