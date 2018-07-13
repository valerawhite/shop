<?php

namespace app\models;
use app\models\Product;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id_cat
 * @property string $name_category
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_category'], 'required'],
            [['name_category'], 'string', 'max' => 100],
			[['image'], 'string', 'max'=>250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cat' => 'Id Cat',
            'name_category' => 'Name Category',
			'image' => 'Image',
        ];
    }
	public function getProducts() {
		return $this->hasMany(Product::className(), ['category_id' => 'id_cat']);
	}
}
