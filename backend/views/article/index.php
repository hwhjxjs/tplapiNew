<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
//            'content:ntext',
            ['attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category->nama;
                },
                'filter' => \common\models\Category::find()->
                select([ 'nama','id'])->orderBy('id')
                    ->indexBy('id')->column(),],
            ['attribute' => 'status',
                'value' => function ($model) {
                    return $model->postStatus->name;
                },
                'filter'=> \common\models\Poststatus::find()->select(['name','id'])->orderBy('id')->indexBy('id')->column(),],
            //'created_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
