<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            ['attribute'=>'content',
                'value'=> function($model){
                    return Html::encode($model->content);
                }],
            ['attribute'=>'category_id',
                'value'=>function($model){
                    return $model->category->nama;
                },],
            ['attribute'=>'status',
                'value'=>$model->postStatus->name],
            ['attribute'=>'created_by',
                'value'=>$model->createdBy->realname],
            ['attribute'=>'created_at',
               'value'=> date('Y-m-d H:i:s',$model->created_at) ],
            ['attribute'=>'updated_at',
                'value'=> date('Y-m-d H:i:s',$model->updated_at) ],
        ],
    ]) ?>

</div>
