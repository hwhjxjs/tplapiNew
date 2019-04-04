<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget('kucha\ueditor\UEditor', [
        'clientOptions' => [
            'serverUrl' => Url::to(['/public/ueditor']),//确保serverUrl正确指向后端地址
            'lang' => 'zh-cn', //中文为 zh-cn
            'initialFrameWidth' => '100%',
            'initialFrameHeight' => '400',

            'toolbars' => [
                [
                    'fullscreen', 'source', '|', 'undo', 'redo', '|',
                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                    'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                    'directionalityltr', 'directionalityrtl', 'indent', '|',
                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                    'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                    'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'attachment', 'map', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                    'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                    'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                    'print', 'preview', 'searchreplace', 'drafts', 'help'
                ],
            ]
        ]
    ], ['class' => 'c-md-7'])->label('文章内容'); ?>

    <!--    --><? //= $form->field($model, 'status')->widget('\common\widgets\images\Images', [
    //        //'type' => \backend\widgets\images\Images::TYPE_IMAGE, // 单图
    //        'saveDB' => 1, //图片是否保存到picture表，默认不保存
    //    ], ['class' => 'c-md-12'])->label('头像')->hint('单图图片尺寸为：300*300'); ?>

    <?php
    $categoryModels = \common\models\Category::find()->all();
    $category = \yii\helpers\ArrayHelper::map($categoryModels, 'id', 'nama');
    ?>

    <?= $form->field($model, 'category_id')->dropDownList($category, ['prompt' => '请选择分类']) ?>

    <?php
    $models = \common\models\Poststatus::find()->all();
    $status = \yii\helpers\ArrayHelper::map($models, 'id', 'name');
    ?>

    <?= $form->field($model, 'status')->dropDownList($status, ['prompt' => '请选择状态']) ?>

    <?php
        $createByModels = \common\models\Adminuser::find()->all();
        $createBy = \yii\helpers\ArrayHelper::map($createByModels,'id','realname');
    ?>

    <?= $form->field($model, 'created_by')->dropDownList($createBy, ['prompt' => '请选择作者']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? "提交" : "修改", ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
