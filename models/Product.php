<?php

namespace app\models;
use app\models\Category;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id_product
 * @property string $name_product
 * @property string $full_text
 * @property int $price
 * @property string $picture
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_product', 'full_text', 'price'], 'required'],
            [['full_text'], 'string'],
            [['price'], 'integer'],
            [['name_product'], 'string', 'max' => 255],
			[['category_id'], 'integer', 'max'=>11],
			[['date'], 'date', 'format'=>'php:Y-m-d'],
			[['date'], 'default', 'value'=>date('Y-m-d')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'name_product' => 'Name Product',
            'full_text' => 'Full Text',
            'price' => 'Price',
            'picture' => 'Picture',
			'category_id'=> 'Category Id',
			'date' => 'Date',
        ];
    }
		public function saveImage($filename)
	{
		$this->picture = 'uploads/'.$filename;
		return $this->save(false);
		
	}
	public function getImage() {
			if($this->picture) {
				
					return  '../../uploads/'. $this->picture;
					
			}
			else {
				return '../no-image.jpg';
			}
		
	}
	public function deleteImage() {
		$imageUploadModel = new ImageUpload();
		$imageUploadModel->deleteCurrentImage($this->picture);
	}
	public function beforeDelete() {
		$this->deleteImage();
		return parent::beforeDelete();
	}
	public function getCategory() {
		return $this->hasOne(Category::className(), ['id_cat' => 'category_id']);	
	}
	public function saveCategory($category_id)	{
		$category = Category::findOne($category_id);
		if($category != null) {
		$this->link('category', $category);
		return true;
		}
	}
	
}
