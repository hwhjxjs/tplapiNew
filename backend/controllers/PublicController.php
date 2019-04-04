<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use common\modelsgii\Region;
use kartik\depdrop\DepDropAction;
use yii\web\Controller;

/**
 * 公共调用处理
 * @author longfei <phphome@qq.com>
 */
class PublicController extends Controller
{

    /** @var bool */
    public $layout = false;

    /** @var bool */
    public $enableCsrfValidation = false;

    /**
     * ---------------------------------------
     * @inheritdoc
     * ---------------------------------------
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            /* ueditor文件上传 */
            'ueditor' => [
                'class' => 'common\actions\UEditorAction',
                'config' => Yii::$app->params['ueditorConfig'],
            ],
            /* 单图、多图上传 */
            'uploadimage' => [
                'class' => 'common\widgets\images\UploadAction',
            ],
        ]);
    }

    /**
     * ---------------------------------------
     * 通用的404错误处理
     * @return string
     * ---------------------------------------
     */
    public function action404()
    {

        //渲染模板
        return $this->render('404');
    }

}
