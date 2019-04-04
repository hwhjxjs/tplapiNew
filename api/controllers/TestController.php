<?php
/**
 * Created by PhpStorm.
 * User: soft
 * Date: 2019-04-02
 * Time: 16:58
 */

namespace api\controllers;




use api\models\UploadedFile;
use common\models\UploadForm;
use Yii;
use yii\rest\Controller;

class TestController extends Controller
{

    /**
     * Lists all Post models.
     * @return mixed
     */
//    public function actionUpload()
//    {
//        $response = array();
//    // 文件类型限制  "file"名字必须和iOS客户端上传的name一致
//        if ($_FILES["imageFile"]["name"] > 0) {
//            //获取传入的文件名
//            $fillName = $_FILES['imageFile']['name'];
//            //以 "." 为界对文件名分割，并存入数组
//            $dotArray = explode('.', $fillName);
//            //获取文件格式
//            $type = end($dotArray);
//            // - - - - -
//            //小技巧:客户端传入的文件名，除了文件的格式要对之外，文件名部分是可以随意填写。
//            //经过点分割后，就可以将文件名和文件格式分开，分开后下标为0的就是文件名，部分，这时候就间接实现了传参，获得用户的id
//            $userId = $dotArray[0];
//            // - - - -
//            //设置存入的文件名（路径）
//            $path = "../web/upload/".$userId.'.'.$type;
//            // 从临时目录复制到目标目录
//            move_uploaded_file($_FILES["imageFile"]["tmp_name"],$path);
//            //校验传入后文件是否存在
//            if (file_exists($path)){
//                $response ['success']= 1;
//                //json格式返回
//                echo json_encode($response);
//            }else {
//                $response ['success'] = 0;
//                echo json_encode($response);
//            }
//        } else {
//            $response ["error"] = "错误代码".$_FILES["file"]["error"];
//            echo json_encode($response);
//
//        }
//    }



    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance( "imageFile");
            if ($model->upload()) {
                // 文件上传成功
                return ;
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}