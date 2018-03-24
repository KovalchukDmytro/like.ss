<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<main>
    <!-- services banner-->
    <section class="section section--slider">
        <div class="carousel bs-slider slide control-square indicators-line" id="service-slider" data-ride="carousel" data-pause="hover" data-interval="5000">
            <ol class="carousel-indicators">
                <li class="active" data-target="#service-slider" data-slide-to="0"></li>
                <li data-target="#service-slider" data-slide-to="1"></li>
                <li data-target="#service-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item clearfix active" style="background-image: url('/images/slider/slide-1-background.jpg');">
                    <div class="bs-slider-overlay"></div>
                    <div class="slide-content content--center">
                        <h2 class="slide-title title--underline" data-animation="animated flipInX">Строительно-ремонтные работы</h2>
                        <h3 class="slide-subtitle" data-animation="animated flipInX">Все виды отделочных <br>и строительных работ под ключ</h3><a class="slider-button" href="#" target="_blank" data-animation="animated fadeInUp">подробнее</a><a class="slider-button" href="#" target="_blank" data-animation="animated fadeInDown">заказать</a>
                    </div>
                </div>
                <div class="item" style="background-image: url('/images/slider/slide-1-background.jpg');">
                    <div class="bs-slider-overlay"></div>
                    <div class="slide-content content--center">
                        <h2 class="slide-title title--underline" data-animation="animated flipInX">Строительно-ремонтные работы</h2>
                        <h3 class="slide-subtitle" data-animation="animated flipInX">Все виды отделочных <br>и строительных работ под ключ</h3><a class="slider-button" href="#" target="_blank" data-animation="animated fadeInUp">подробнее</a><a class="slider-button" href="#" target="_blank" data-animation="animated fadeInDown">заказать</a>
                    </div>
                </div>
                <div class="item" style="background-image: url('/images/slider/slide-1-background.jpg');">
                    <div class="bs-slider-overlay"></div>
                    <div class="slide-content content--center">
                        <h2 class="slide-title title--underline" data-animation="animated flipInX">Строительно-ремонтные работы</h2>
                        <h3 class="slide-subtitle" data-animation="animated flipInX">Все виды отделочных <br>и строительных работ под ключ</h3><a class="slider-button" href="#" target="_blank" data-animation="animated fadeInUp">подробнее</a><a class="slider-button" href="#" target="_blank" data-animation="animated fadeInDown">заказать</a>
                    </div>
                </div>
            </div><a class="left carousel-control" href="#service-slider" role="button" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#service-slider" role="button" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
        </div>
    </section>
    <!-- services-->
    <section class="section section--services">
        <h2 class="section__title wow zoomIn" data-wow-delay="0.3s">Услуги</h2>
        <div class="container">
            <div class="row equal equal-xs-column">
                <div class="col-xs-12 col-md-4">
                    <article class="widget">
                        <div class="widget-background" style="background-image: url('/images/services/services-1.jpg');"></div>
                        <h3 class="widget__title title--underlined">Дизайн интерьера и архитектура</h3>
                        <div class="widget__description">Архитектурный дизайн и проектирование помещений. Особенности современного дома и определенных его помещений в большинстве случаев обуславливает именно архитектура, которая закладывалась еще на этапе проектирования здания.</div><a class="widget__button" href="">Перейти к услуге</a>
                    </article>
                </div>
                <div class="col-xs-12 col-md-4">
                    <article class="widget">
                        <div class="widget-background" style="background-image: url('/images/services/services-2.jpg');"></div>
                        <h3 class="widget__title title--underlined">Компьютерная 3D графика</h3>
                        <div class="widget__description">Интерактивный трёхмерный макет Вашего будущего интерьера. Мы сделаем фотореалистичную модель, чтобы Вы смогли ощутить эффект полного присутствия. Современная техническая и программная база дают возможность достичь этой цели.</div><a class="widget__button" href="">Перейти к услуге</a>
                    </article>
                </div>
                <div class="col-xs-12 col-md-4">
                    <article class="widget">
                        <div class="widget-background" style="background-image: url('/images/services/services-3.jpg');"></div>
                        <h3 class="widget__title title--underlined">Строительно-ремонтные работы</h3>
                        <div class="widget__description">Наши специалисты выполнят строительную работу любой сложности: небольшой косметический ремонт или капитальный ремонт «под ключ». Вне зависимости от количества поставленных задач, Вы можете быть уверены, что все будет выполнено профессионально и качественно.</div><a class="widget__button" href="">Перейти к услуге</a>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- news section-->
    <section class="section section--news">
        <h2 class="section__title news--title wow zoomIn" data-wow-delay="0.3s">Новости</h2>
        <div class="container">
            <div class="row equal equal-xs-column">
                <div class="col-xs-12 col-sm-4">
                    <article class="widget widget--small">
                        <div class="widget-background" style="background-image: url('/images/news/news-1.jpg');"></div>
                        <header class="news-post--header">
                            <time class="widget__public-date">22.12.2017</time>
                            <h3 class="widget__title title--small">Дизайн квартиры-студии</h3>
                        </header>
                        <div class="widget__description description--small-text">Люди, которые хотят создать в своей квартире функциональное и выразительное пространство, визуально воздушное и лёгкое для восприятия, чаще всего отдают предпочтение студии.</div><a class="widget__button widget__button--fluid" href="">Подобнее</a>
                    </article>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <article class="widget widget--small">
                        <div class="widget-background" style="background-image: url('/images/news/news-2.jpg');"></div>
                        <header class="news-post--header">
                            <time class="widget__public-date">16.01.2018</time>
                            <h3 class="widget__title title--small">Строительные материалы</h3>
                        </header>
                        <div class="widget__description description--small-text">Ни один ремонт не обходится без применения строительных материалов. В этой статье мы рассмотрим основные их виды и дадим советы по применению в тот или иной конктертной ситуации.</div><a class="widget__button widget__button--fluid" href="">Подобнее</a>
                    </article>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <article class="widget widget--small">
                        <div class="widget-background" style="background-image: url('/images/news/news-3.jpg');"></div>
                        <header class="news-post--header">
                            <time class="widget__public-date">22.12.2017</time>
                            <h3 class="widget__title title--small">Ошибки во время ремонта</h3>
                        </header>
                        <div class="widget__description description--small-text">Люди, которые впервые сталкиваются с ремонтом и малознакомые с его спецификой, редко задумываются, что в процессе ремонта могут появиться много дополнительных задач, которых до этого не было.</div><a class="widget__button widget__button--fluid" href="">Подобнее</a>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- partners-->
    <section class="section section--partners">
        <h2 class="section__title wow zoomIn" data-wow-delay="0.3s">Партнеры</h2>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="owl-carousel owl-theme owl-wrapper" id="partners-carousel">
                        <div class="item">
                            <figure class="slide"><img class="slide-image" src="images/partners/carousel-image-1.png" alt=""></figure>
                        </div>
                        <div class="item">
                            <figure class="slide"><img class="slide-image" src="images/partners/carousel-image-2.png" alt=""></figure>
                        </div>
                        <div class="item">
                            <figure class="slide"><img class="slide-image" src="images/partners/carousel-image-3.jpg" alt=""></figure>
                        </div>
                        <div class="item">
                            <figure class="slide"><img class="slide-image" src="images/partners/carousel-image-4.png" alt=""></figure>
                        </div>
                        <div class="item">
                            <figure class="slide"><img class="slide-image" src="images/partners/carousel-image-5.png" alt=""></figure>
                        </div>
                        <div class="item">
                            <figure class="slide"><img class="slide-image" src="images/partners/carousel-image-6.png" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>