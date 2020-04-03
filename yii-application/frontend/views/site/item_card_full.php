<div class="row">
    <div class="col-md-12">
        <p><a href="/site/view/<?= $model->id ?>"><?= $model->name ?></a></p>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-lg-6 col-xs-12">
        <?php if ($model->productImages) : ?>
            <img class="card_image" src="<?= '/uploads/' . $model->productImages[0]->path; ?>">
        <?php endif ?>
    </div>
    <div class="col-md-6">
        <p><?= $model->description ?></p>
    </div>
</div>

<div class="row">
    <div class="col-md-6" style="padding-top: 20px">
        <?= \frontend\helpers\CategoryHelper::breadcrumbsHtml($model) ?>
    </div>
    <div class="col-md-6">
        <?= $model->price ?> EUR
    </div>

    <div class="col-md-6">

        <?php foreach ($model->productAttributes as $productAttribute) : ?>

            <?= $productAttribute->attribute0->name ?>
            <?= $productAttribute->attribute_value ?>
            <?= $productAttribute->attribute0->units ?>
            <br>
        <?php endforeach; ?>
    </div>
</div>