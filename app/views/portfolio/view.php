<?php  use yii\helpers\Url; ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=Url::toRoute( '/' ) ?>"><?= $this->params['home-page'] ?></a></li>
				<li><a href="<?= Url::toRoute( '/portfolio' ) ?>"><?= $this->params['portfolio-page'] ?></a></li>
				<li><a><?=$content['model']->info->title ?></a></li>
			</ol>
		</div>
	</div>
</div>
<main class="main-content background-image">
    <div class="container container--bordered">
        <div class="row">
            <div class="col-sm-12">
                <!-- portfolio-->
                <section class="section">
                    <h2 class="section-title"><?=$content['model']->info->title ?></h2>
                    <div class="slider-display">
                        <?php foreach ($content['model']->bimgs as $img): ?>
                            <div>
                                <div class="image"><img class="portfolio-img" src="<?=$img ?>" alt=""></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="slider-nav">
	                    <?php foreach ($content['model']->bimgs as $img): ?>
                            <div>
                                <div class="image"><img src="<?=$img ?>" alt=""></div>
                            </div>
	                    <?php endforeach; ?>
                    </div>
                </section>
                <!-- seo text -->
                <section class="section section--seo">
                    <div class="text seo-text">
                        <?=$content['model']->info->text ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>