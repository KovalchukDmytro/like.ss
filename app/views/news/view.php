<?php  use yii\helpers\Url; ?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?=Url::toRoute( '/' ) ?>"><?= $this->params['home-page'] ?></a></li>
				<li><a href="<?= Url::toRoute( '/news' ) ?>"><?= $this->params['news-page'] ?></a></li>
				<li><a><?=$content['model']->info->title ?></a></li>
			</ol>
		</div>
	</div>
</div>
<main class="main-content background-image">
    <div class="container container--bordered">
        <div class="row">
            <div class="col-sm-12">
                <!-- news-post-->
                <section class="section section--news-post">
                    <time class="post-date"><?=$content['model']->date ?></time>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="post-gallery">
                                <img class="gallery-image" src="<?=$content['model']->bimg ?>" alt="">
                                <img class="gallery-image" src="/images/news/Bed_room_17.jpg" alt="">
                                <img class="gallery-image" src="/images/news/Vannaja_View_28.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <h3 class="post-title"><?=$content['model']->info->title ?></h3>
                            <div class="text"><?=$content['model']->info->text ?></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>