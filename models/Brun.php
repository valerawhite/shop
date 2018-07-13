<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brun".
 *
 * @property int $id_brun
 * @property int $id_user
 * @property int $id_product
 * @property int $verify
 */
class Brun extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_product'], 'required'],
            [['id_user', 'id_product', 'flag'], 'integer'],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_brun' => 'Id Brun',
            'id_user' => 'Id User',
            'id_product' => 'Id Product',
            'flag' => 'Flag',
        ];
    }
	
	public function getProductbrun() {
		return $this->hasMany(Product::className(), ['id_product' => 'id_product']);
	}
}
