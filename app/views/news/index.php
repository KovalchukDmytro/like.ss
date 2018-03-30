<?php  use yii\helpers\Url; ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?= Url::toRoute( '/' ) ?>"><?= $this->params['home-page'] ?></a></li>
				<li><a><?= $this->params['news-page'] ?></a></li>
			</ol>
		</div>
	</div>
</div>
<main class="main-content background-image">
    <div class="container container--bordered">
        <div class="row">
            <div class="col-sm-12">
                <section class="section--news-page">
	                <?php
                    use app\components\BaseController;
	                use app\widgets\SLinkPager;

	                foreach ($models as $model):?>
                        <article class="row post-item clearfix">
                            <div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-0">
                                <time class="post-date"><?= BaseController::changeDate( $model->date) ?></time>
                                <figure class="post-wrapper"><img class="post-image" src="<?=$model->bimg ?>" alt="">
                                    <figcaption class="post-image-desc"><a class="post-image-link" href="/news/<?=$model->alias ?>"><?= $this->params['learn-more-index'] ?></a></figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-0"><a class="post-link" href="<?= Url::toRoute( '/news/'.$model->alias ) ?>">
                                    <h3 class="post-title"><?=$model->info->title ?></h3></a>
                                <p class="post-description"><?=$model->info->text ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                    <div class="col-sm-12">
	                    <?php
	                    echo SLinkPager::widget([
		                    'pagination' => $pages,
	                    ]);

	                    ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>