<?php use yii\helpers\Url; ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?= Url::toRoute( '/' ) ?>"><?= $this->params['home-page'] ?></a></li>
                <li><a><?= $this->params['portfolio-page'] ?></a></li>
            </ol>
        </div>
    </div>
</div>
<main class="main-content background-image">
    <div class="container container--bordered">
        <div class="row">
            <div class="col-sm-12">
                <section class="section section--portfolio">
                    <h2 class="section-title"><?= $this->params['portfolio-page'] ?></h2>
                    <div class="row">
						<?php $i = 0; ?>
						<?php foreach ( $content['models'] as $model ): $i += 1; ?>
                            <div class="col-sx-12 col-sm-8 <?= ( $i % 2 !== 0 ) ? 'col-sm-offset-4' : '' ?>">
                                <a href="<?= Url::toRoute( '/portfolio/'.$model->alias ) ?>" class="portfolio-link">
                                    <figure class="portfolio-item">
                                        <img class="portfolio-image" src="<?=$model->bimg ?>" alt="">
                                        <figcaption class="portfolio-description <?= ( $i % 2 !== 0 ) ? 'desc-left' : 'desc-right' ?>">
                                            <h3 class="portfolio-title"><?=$model->info->title ?></h3>
                                            <div class="portfolio-desc">
                                                <p><?=$model->info->description ?></p>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
						<?php endforeach; ?>
<!--                        <div class="col-sx-12 col-sm-8 col-sm-offset-4">-->
<!--                            <a class="portfolio-link">-->
<!--                                <figure class="portfolio-item"><img class="portfolio-image"-->
<!--                                                                    src="images/portfolio/IMG_3598.jpg" alt="">-->
<!--                                    <figcaption class="portfolio-description desc-left">-->
<!--                                        <h3 class="portfolio-title">Загородный дом</h3>-->
<!--                                        <div class="portfolio-desc">-->
<!--                                            <p>Отделочные работы – этап, предполагающий огромное количество вариантов и-->
<!--                                                позволяющий не только придать вашему дому индивидуальность, но и сделать-->
<!--                                                это в рамках заданного бюджета. Однако для работы с современными-->
<!--                                                отделочными материалами зачастую необходимо приглашать квалифицированных-->
<!--                                                мастеров, владеющих необходимыми технологиями.</p>-->
<!--                                        </div>-->
<!--                                    </figcaption>-->
<!--                                </figure>-->
<!--                            </a>-->
<!--                        </div>-->
<!---->
<!--                        <div class="col-sx-12 col-sm-8"><a class="portfolio-link">-->
<!--                                <figure class="portfolio-item"><img class="portfolio-image"-->
<!--                                                                    src="images/portfolio/IMG_3572.jpg" alt="">-->
<!--                                    <figcaption class="portfolio-description desc-right">-->
<!--                                        <h3 class="portfolio-title">Дизайн спальни</h3>-->
<!--                                    </figcaption>-->
<!--                                </figure>-->
<!--                            </a></div>-->
<!--                        <div class="col-sx-12 col-sm-8 col-sm-offset-4"><a class="portfolio-link">-->
<!--                                <figure class="portfolio-item"><img class="portfolio-image"-->
<!--                                                                    src="images/portfolio/IMG_3571.jpg" alt="">-->
<!--                                    <figcaption class="portfolio-description desc-left">-->
<!--                                        <h3 class="portfolio-title">Загородный дом</h3>-->
<!--                                    </figcaption>-->
<!--                                </figure>-->
<!--                            </a></div>-->
<!--                        <div class="col-sx-12 col-sm-8"><a class="portfolio-link">-->
<!--                                <figure class="portfolio-item"><img class="portfolio-image"-->
<!--                                                                    src="images/portfolio/IMG_3553.jpg" alt="">-->
<!--                                    <figcaption class="portfolio-description desc-right">-->
<!--                                        <h3 class="portfolio-title">Дизайн спальни</h3>-->
<!--                                    </figcaption>-->
<!--                                </figure>-->
<!--                            </a></div>-->
<!--                        <div class="col-sx-12 col-sm-8 col-sm-offset-4"><a class="portfolio-link">-->
<!--                                <figure class="portfolio-item"><img class="portfolio-image"-->
<!--                                                                    src="images/portfolio/IMG_3322.jpg" alt="">-->
<!--                                    <figcaption class="portfolio-description desc-left">-->
<!--                                        <h3 class="portfolio-title">Загородный дом</h3>-->
<!--                                    </figcaption>-->
<!--                                </figure>-->
<!--                            </a></div>-->
<!--                        <div class="col-sx-12 col-sm-8"><a class="portfolio-link">-->
<!--                                <figure class="portfolio-item"><img class="portfolio-image"-->
<!--                                                                    src="images/portfolio/IMG_3515.jpg" alt="">-->
<!--                                    <figcaption class="portfolio-description desc-right">-->
<!--                                        <h3 class="portfolio-title">Дизайн спальни</h3>-->
<!--                                    </figcaption>-->
<!--                                </figure>-->
<!--                            </a></div>-->
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>