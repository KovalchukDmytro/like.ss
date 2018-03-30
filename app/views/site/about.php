<?php  use yii\helpers\Url; ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?= Url::toRoute( '/' ) ?>"><?= $this->params['home-page'] ?></a></li>
                <li><a><?= $this->params['about-us-page'] ?></a></li>
            </ol>
        </div>
    </div>
</div>
<main class="main-content background-image">
    <div class="container container--bordered">
        <div class="row">
            <div class="col-sm-12">
                <!-- about us-->
                <section class="section section--about-us">
                    <h1 class="section-title section-title--about-us"><?= $this->params['about-us-page'] ?></h1>
                    <div class="text">
                        <p>Наша компания оказывает услуги архитектурного проектирования, дизайна интерьеров, компьютерной 3D графики, строительно-ремонтных работ на высоком профессиональном уровне и по конкурентоспособной цене на рынке Киева и пригорода столицы.</p>
                        <p>Современный дизайн давно ушел от банального выбора стиля, отделочных материалов и декоративных элементов. Мы создаем интерьеры нового поколения, которые отвечают современным требованиям.</p>
                        <p>При 3D визуализации мы используем только современное профессиональное программное обеспечение, которое позволяет создавать уникальные проекты с проработкой мельчайших деталей и максимально реалистично передает внешний вид будущего интерьера/экстерьера.</p>
                        <p>Обратившись в нашу компанию, Вы не только получите уникальный проект жилого дома, разработанный с учетом ваших пожеланий и возможностей, но и будете уверены в последующем доведении ремонта до сдачи.</p>
                        <p>Мы стараемся учесть все Ваши желания и возможности.</p>
                        <p>Закажите обратный звонок для получения дополнительной консультации.</p>
                    </div>
                    <div class="gallery-slider">
                        <div class="owl-carousel owl-theme owl-wrapper" id="about-us-carousel">
                            <div class="item"><img src="/images/about-us/IMG_8410.jpg" alt=""></div>
                            <div class="item"><img src="/images/about-us/IMG_8411.jpg" alt=""></div>
                            <div class="item"><img src="/images/about-us/IMG_8452.jpg" alt=""></div>
                            <div class="item"><img src="/images/about-us/IMG_3593.jpg" alt=""></div>
                            <div class="item"><img src="/images/about-us/IMG_8410.jpg" alt=""></div>
                            <div class="item"><img src="/images/about-us/IMG_8411.jpg" alt=""></div>
                            <div class="item"><img src="/images/about-us/IMG_8452.jpg" alt=""></div>
                            <div class="item"><img src="/images/about-us/IMG_3593.jpg" alt=""></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>