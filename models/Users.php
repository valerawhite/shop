<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $date
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'date'], 'required'],
            [['date'], 'safe'],
            [['username', 'first_name', 'last_name', 'oblast', 'district', 'street'], 'string', 'max' => 40],
            [['password', 'email'], 'string', 'max' => 40],
			[['house', 'flat', 'phone'], 'integer', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'date' => 'Date',
        ];
    }
}
