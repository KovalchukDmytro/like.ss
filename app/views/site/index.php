<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<main class="main-content">
    <section class="section section--slider">
        <div class="carousel bs-slider slide control-square indicators-line" id="service-slider" data-ride="carousel"
             data-pause="hover" data-interval="5000">
            <ol class="carousel-indicators">
	            <?php $i = -1; ?>
	            <?php foreach ( $content['banner'] as $model ) : $i+=1; ?>
		            <?php if ( $i == 0 ): ?>
                        <li class="active" data-target="#service-slider" data-slide-to="<?= $i; ?>"></li>
		            <?php else: ?>
                        <li data-target="#service-slider" data-slide-to="<?= $i; ?>"></li>
		            <?php endif; ?>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner" role="listbox">
				<?php $i = 1; ?>
				<?php foreach ( $content['banner'] as $model ) : ?>
					<?php if ( $i == 1 ): $i+=1;?>
                        <div class="item clearfix active" style="background-image: url(<?= $model->bimg ?>);">
                            <div class="bs-slider-overlay"></div>
                        </div>
					<?php else: ?>
                        <div class="item" style="background-image: url(<?= $model->bimg ?>);">
                            <div class="bs-slider-overlay"></div>
                        </div>
					<?php endif; ?>
				<?php endforeach; ?>
            </div>
            <a class="left carousel-control" href="#service-slider" role="button" data-slide="prev"><span
                        class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span
                        class="sr-only">Previous</span></a><a class="right carousel-control" href="#service-slider"
                                                              role="button" data-slide="next"><span
                        class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span
                        class="sr-only">Next</span></a>
        </div>
    </section>
    <!-- services-->
    <section class="section section-services">
        <h2 class="section-title wow zoomIn" data-wow-delay="0.3s"><?= $this->params['services-page'] ?></h2>
        <div class="container">
            <div class="row equal equal-xs-column">
				<?php foreach ( $content['service_category'] as $model ) : ?>
                    <div class="col-xs-12 col-sm-6 col-lg-3">
                        <article class="widget">
                            <div class="widget-background" style="background-image: url(<?= $model->bimg ?>);"></div>
                            <h3 class="widget-title title--underlined"><?= $model->info->title ?></h3>
                            <div class="widget-description"><?= $model->info->text ?></div>
                            <a class="widget-button"
                               href="<?= Url::toRoute( '/service/'.$model->alias ) ?>"><?= $this->params['go-to-the-service-index'] ?></a>
                        </article>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- news section-->
    <section class="section section--news">
        <h2 class="section-title news--title wow zoomIn" data-wow-delay="0.3s"><?= $this->params['news-page'] ?></h2>
        <div class="container">
            <div class="row equal equal-xs-column">
				<?php foreach ( $content['news'] as $model ) : ?>
                    <div class="col-xs-12 col-sm-4">
                        <article class="widget widget--fluid">
                            <div class="widget-background" style="background-image: url(<?= $model->bimg ?>);"></div>
                            <header class="news-post--header">
                                <time class="widget-date"><?= $model->date ?></time>
                                <h3 class="widget-title"><?= $model->info->title ?></h3>
                            </header>
                            <div class="widget-description"><?= substr( $model->info->text, 0, 170 ) . '...' ?></div>
                            <a class="widget-button widget-button--fluid"
                               href="<?= Url::toRoute( '/news/'.$model->alias ) ?>"><?= $this->params['learn-more-index'] ?></a>
                        </article>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
</main>