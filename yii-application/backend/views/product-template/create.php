<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductTemplate */

$this->title = 'Create Product Template';
$this->params['breadcrumbs'][] = ['label' => 'Product Templates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
