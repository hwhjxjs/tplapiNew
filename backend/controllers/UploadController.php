<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 2019-01-23
 * Time: 16:45
 */

namespace backend\controllers;


use common\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class UploadController extends Controller
{


    public function actionIndex()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // 文件上传成功
                return;
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}