<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 2019-01-25
 * Time: 11:17
 */

namespace api\controllers;


use api\models\ApiLoginForm;
use api\models\RegistForm;
use api\models\UnregistForm;
use Yii;
use yii\rest\ActiveController;


class AdminuserController extends ActiveController
{
    public $modelClass = "common\models\Adminuser";
    use Send;

    /*登录*/
    public function actionLogin()
    {
        $model = new ApiLoginForm();
//        $model->username = $_POST['username'];
//        $model->password = $_POST['password'];
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->login()) {

            return $this->returnMsg(Yii::$app->response->statusCode, 'success', ['access_token' => $model->login()]);
        } else {
            $model->validate();
            return $model;
        }
    }


    /*注册*/
    public function actionRegist()
    {
        $model = new RegistForm();
        $model->load(Yii::$app->request->getBodyParams(), '');

        if ($model->regist()) {

            return $this->returnMsg(Yii::$app->response->statusCode, '注册成功', ['regist' => $model->regist()]);
        } else {
            $model->validate();
            return $this->returnMsg(Yii::$app->response->statusCode, $model->errors, ['regist' => $model]);
        }


    }


    /*注销*/
    public function actionUnregist()
    {
        $model = new UnregistForm();
        $model->load(Yii::$app->request->getBodyParams(), '');

        if ( $model->unRegist()) {
            return $this->returnMsg(Yii::$app->response->statusCode, '注销成功', ['unregist' => $model->unRegist()]);
        } else {
            $model->validate();
            return $this->returnMsg(Yii::$app->response->statusCode, '会员不存在', ['unregist' => $model]);
        }

    }


}