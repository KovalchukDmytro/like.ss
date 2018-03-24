<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="#">Главная</a></li>
				<li><a href="#">Новости</a></li>
				<li><a href="#">Бетон в интерьере</a></li>
			</ol>
		</div>
	</div>
</div>
<main>
	<section class="section section--news-post">
		<div class="container container--bordered">
			<div class="row">
				<div class="col-xs-12">
					<time class="post__date"><?=$model->date ?></time>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-4">
					<div class="post-gallery"><img class="gallery__image" src="<?=$model->bimg ?>" alt=""><img class="gallery__image" src="images/news/news-image-03.jpg" alt=""><img class="gallery__image" src="images/news/news-image-03.jpg" alt=""></div>
				</div>
				<div class="col-xs-12 col-md-8">
					<h3 class="post__title"><?=$model->info->title ?></h3>
					<p class="post__description"><?=$model->info->text ?></p>
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
							<figure class="slide"><img class="slide-image" src="/images/partners/carousel-image-1.png" alt=""></figure>
						</div>
						<div class="item">
							<figure class="slide"><img class="slide-image" src="/images/partners/carousel-image-2.png" alt=""></figure>
						</div>
						<div class="item">
							<figure class="slide"><img class="slide-image" src="/images/partners/carousel-image-3.jpg" alt=""></figure>
						</div>
						<div class="item">
							<figure class="slide"><img class="slide-image" src="/images/partners/carousel-image-4.png" alt=""></figure>
						</div>
						<div class="item">
							<figure class="slide"><img class="slide-image" src="/images/partners/carousel-image-5.png" alt=""></figure>
						</div>
						<div class="item">
							<figure class="slide"><img class="slide-image" src="/images/partners/carousel-image-6.png" alt=""></figure>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>