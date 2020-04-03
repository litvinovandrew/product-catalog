<?php

/* @var $this yii\web\View */

$this->title = 'Product Catalog';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Results for "<?= $category->name?>" category!</h1>

    </div>

    <div class="body-content">
        <div class="row">

            <?php foreach ($dataProvider->getModels() as $model) : ?>

                <?= $this->render('@frontend/views/site/item_card', ['model' => $model]); ?>

            <?php endforeach; ?>
        </div>


    </div>
</div>
