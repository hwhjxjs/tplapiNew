<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 2019-01-23
 * Time: 16:44
 */

namespace common\models;



use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

//    public function rules()
//    {
//        return [
//            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
//        ];
//    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('../web/upload/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}