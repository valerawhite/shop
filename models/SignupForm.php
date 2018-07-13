<?php

namespace app\models;
use yii\base\Model;

class SignupForm extends Model
{

public $username;
public $email;
public $password;
public $date;

   public function rules()
    {
        return [
            
            [['username', 'password', 'email'], 'required'],

            [['username'], 'string'],
    
            [['email'], 'email'],
			[['email'], 'unique', 'targetClass'=> 'app\models\Users', 'targetAttribute'=>'email'],
			[['date'], 'date', 'format'=>'php:Y-m-d'],
			[['date'], 'default', 'value'=>date('Y-m-d')],
			
		];
    }
	public function signup() {
		if($this->validate()) {
			$user = new Users();
			$user->attributes = $this->attributes;
			return $user->save(false);
			
		}
		
	}
}
?>