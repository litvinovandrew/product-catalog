<div class="col-xs-12 col-md-6 item">

    <div class="row">
        <div class="col-md-12">
            <p><a class="product_title" href="/site/view/<?=$model->id?>"><?= $model->name ?></a> </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xs-12">
            <div class="thumbnail">
            <?php if ($model->productImages) : ?>
                <img  class="" alt="Responsive image" src="<?= '/uploads/'. $model->productImages[0]->path; ?>">
            <?php endif ?>
            </div>
        </div>
        <div class="col-md-6">
            <p><?= substr($model->description,0,200).'...' ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= \frontend\helpers\CategoryHelper::breadcrumbsHtml($model) ?>
        </div>
        <div class="col-md-6">
            <?= $model->price ?>
        </div>
    </div>
</div>