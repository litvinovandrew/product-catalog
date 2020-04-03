<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome to Grid view!</h1>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?php \yii\widgets\Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= \yii\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'name',
                        [
                                'attribute' => 'description',
                            'content' => function($model) {
                                return substr($model->description,0,100).'...';
                            }
                        ],
//                        'description:ntext',
                        'status',
                        'slug',
                        //'template_id',
                        //'user_id',
                        //'category_id',
                        //'created_at',
                        //'updated_at',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

                <?php \yii\widgets\Pjax::end(); ?>
        </div>

    </div>
</div>
