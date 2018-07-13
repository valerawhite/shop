<?php
namespace app\models;
use Yii;
use yii\base\Model;

class ImageUpload extends Model {
	
	public $picture;
	public function  rules() 
	{
		
		return [
		[['picture'], 'required'],
		[['picture'], 'file', 'extensions' => 'jpg,png']
	];
}
	public function uploadFile($file, $currentImage) 
	{
	$this->deleteCurrentImage($currentImage);
	$filename =  strtolower(md5(uniqid($file->baseName))) . '.' . $file->extension;
	$file->saveAs('../web/uploads/' .$filename);
	return $filename;
	}
	
	
public function deleteCurrentImage($currentImage) {
		if($this->fileExist($currentImage) && $currentImage !== '') {
		unlink('../web/uploads/' . $currentImage);
		}
		
}
public function fileExist($currentImage) {
		return file_exists('../web/uploads/' . $currentImage);
	}
}


?>