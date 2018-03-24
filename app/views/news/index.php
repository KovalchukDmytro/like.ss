<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="/">Главная</a></li>
				<li><a>Новости</a></li>
			</ol>
		</div>
	</div>
</div>
<main>
	<section class="section--news-page">
		<div class="container container--bordered">
			<div class="row">
				<div class="col-xs-12">
                    <?php use app\widgets\SLinkPager;
                    use yii\widgets\LinkPager;

                    foreach ($models as $model){?>
                        <article class="post__item clearfix">
                            <time class="post__date"><?=$model->date ?></time>
                            <figure class="post__image-wrapper"><img class="post__image" src="<?=$model->bimg ?>" alt="">
                                <figcaption class="post__image-description"><a class="post__image-link" href="/news/<?=$model->alias ?>">Подробнее			</a></figcaption>
                            </figure><a class="post__link" href="/news/<?=$model->alias ?>">
                                <h3 class="post__title"><?=$model->info->title ?></h3></a>
                            <p class="post__description"><?=$model->info->text ?></p>
                        </article>
                    <?php } ?>
				</div>
				<div class="col-xs-12">
					<?php
					echo SLinkPager::widget([
						'pagination' => $pages,
					]);

					?>

                    <ul class="pagination">

						<li class="pagination__item"><a class="pagination__link" href="#">&laquo;</a></li>
						<li class="pagination__item"><a class="pagination__link" href="#">1</a></li>
						<li class="pagination__item"><a class="pagination__link" href="#">2</a></li>
						<li class="pagination__item"><a class="pagination__link pagination__link--current" href="#">3</a></li>
						<li class="pagination__item"><a class="pagination__link" href="#">4</a></li>
						<li class="pagination__item"><a class="pagination__link" href="#">5</a></li>
						<li class="pagination__item"><a class="pagination__link" href="#">&raquo;</a></li>
					</ul>
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