<?php

namespace app\models;

class User extends Users implements \yii\web\IdentityInterface
{
 
	
    public static function findIdentity($id)
    {
        return  static::findOne($id);
    }
	
    public static function findIdentityByAccessToken($token, $type = null)
    {
 
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
       
    }

    public function validateAuthKey($authKey)
    {
     
    }

    public function validatePassword($password)
    {
		
        return $this->password === $password;
    }

}
