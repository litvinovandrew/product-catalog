<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome!</h1>

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
                        'description:ntext',
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
