<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header">
	<div class="container hidden-xs">
		<div class="row header-widgets">
			<div class="col-sm-2">
				<div class="widget-logo"><a class="widget-logo__link" href="index.html"><img class="widget-logo__image" src="/images/logo.png" alt=""></a></div>
			</div>
			<div class="col-sm-4 col-sm-offset-2">
				<div class="widget-schedule">
					<p class="schedule__item"><span class="schedule-item--bold"> <?=$this->params['header_schedule'] ?> </span></p>
					<p class="schedule__item"><span class="schedule-item--bold"> ПН - ПТ: </span> 9:00 - 20:00</p>
					<p class="schedule__item"><span class="schedule-item--bold">СБ:</span> 10:00 - 17:00</p>
					<p class="schedule__item"><span class="schedule-item--bold">ВС:</span> выходной</p>
				</div>
			</div>
			<div class="col-sm-4 col-lg-3 col-lg-offset-1">
				<div class="widget-contacts"><a class="contacts__link">+38 (067) 243 87 63</a><a class="contacts__link">alkrasovskiy@gmail.com</a></div>
				<div class="widget-search">
					<form class="search__inner">
						<input class="search__input" type="text" placeholder="поиск по сайту">
						<button class="search__submit" type="submit"><span class="glyphicon glyphicon-search"></span></button>
					</form>
				</div>
				<div class="widget-langs">

                    <a class="langs__current" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$this->params['lang']->name?><span class="caret"></span></a>
					<ul class="dropdown-menu langs__list">

                        <?php foreach ($this->params['langs'] as $l):?>
						<li class="langs__item"><a href="<?= $l->langUrl?>" class="langs__link"><?=$l->name?></a></li>
                        <?php endforeach;?>

					</ul>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar main-menu navbar-default">
		<div class="container">
			<div class="navbar-header visible-xs-block">
				<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="index.html"><span><img class="mobile-logo" src="images/logo.png" alt=""></span></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-left">
					<li><a class="main-menu__link">Дизайн интерьера и архитектура</a></li>
					<li><a class="main-menu__link">Компьютерная 3D графика</a></li>
					<li><a class="main-menu__link">Строительно-ремонтные работы</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a class="main-menu__link menu__link--dropdown hidden-xs" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 484.975 484.975" xml:space="preserve" width="100%">
										<path style="fill:#ffffff;" d="M462.419,165.912H22.556c0,0-22.556,0-22.556-38.287s22.556-38.287,22.556-38.287h439.863 c0,0,22.556,0,22.556,38.287S462.419,165.912,462.419,165.912z"></path>
								<path style="fill:#ffffff;" d="M462.419,280.776H22.556c0,0-22.556,0-22.556-38.288S22.556,204.2,22.556,204.2h439.863 c0,0,22.556,0,22.556,38.287C484.975,280.776,462.419,280.776,462.419,280.776z"></path>
								<path style="fill:#ffffff;" d="M462.419,395.637H22.556c0,0-22.556,0-22.556-38.286c0-38.288,22.556-38.288,22.556-38.288 h439.863c0,0,22.556,0,22.556,38.288C484.975,395.637,462.419,395.637,462.419,395.637z"></path>
									</svg></a><a class="main-menu__link visible-xs-block" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">О компании<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu__item"><a class="dropdown-menu__link" href="/about-us">О нас</a></li>
							<li><a class="dropdown-menu__link" href="portfolio.html">Портфолио</a></li>
							<li><a class="dropdown-menu__link" href="/news">Новости</a></li>
							<li><a class="dropdown-menu__link" href="/contacts">Контакты</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<?= $content ?>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="footer-widget"><a class="footer-logo__link" href="#"><img src="/images/logo.png" alt=""></a>
					<p class="copyright">Copyright © 2000-2017 <span>Все права защищены</span></p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="footer-widget">
					<nav class="footer-menu"><a class="footer-menu__link">Главная</a><a class="footer-menu__link"> Дизайн интерьера и архитектура</a><a class="footer-menu__link"> Компьютерная 3D графика</a><a class="footer-menu__link"> Строительно-ремонтные работы</a><a class="footer-menu__link"> Новости</a><a class="footer-menu__link"> Контакты</a></nav>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="footer-widget">
					<div class="footer-contacts"><span class="footer-contacts__header">Александр</span><a class="footer-contacts__link">+38 (067) 243 87 63</a><a class="footer-contacts__link">alkrasovskiy@gmail.com</a></div>
				</div>
				<div class="footer-widget"><span class="social__title">Мы в социальных сетях</span>
					<nav class="menu-social"><a class="social__link">
							<svg class="social__icon" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="40px" height="40px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd;" viewBox="0 0 40 40" xmlns:xlink="http://www.w3.org/1999/xlink">
										<path d="M34.61 0l-29.22 0c-2.97,0 -5.39,2.41 -5.39,5.39l0 29.22c0,2.98 2.42,5.39 5.39,5.39l14.41 0 0.03 -14.29 -3.72 0c-0.48,0 -0.87,-0.39 -0.87,-0.88l-0.02 -4.6c0,-0.49 0.39,-0.88 0.88,-0.88l3.7 0 0 -4.46c0,-5.16 3.16,-7.98 7.77,-7.98l3.78 0c0.48,0 0.88,0.4 0.88,0.88l0 3.89c0,0.48 -0.4,0.87 -0.88,0.87l-2.32 0c-2.51,0 -2.99,1.19 -2.99,2.94l0 3.86 5.51 0c0.52,0 0.93,0.45 0.86,0.98l-0.54 4.6c-0.05,0.44 -0.43,0.78 -0.87,0.78l-4.94 0 -0.02 14.29 8.57 0c2.98,0 5.39,-2.41 5.39,-5.39l0 -29.22c0,-2.98 -2.41,-5.39 -5.39,-5.39z"></path>
									</svg></a><a class="social__link">
							<svg class="social__icon" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="40px" height="40px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd;" viewBox="0 0 40 40" xmlns:xlink="http://www.w3.org/1999/xlink">
										<path d="M34.61 0l-29.22 0c-2.98,0 -5.39,2.41 -5.39,5.39l0 29.22c0,2.98 2.41,5.39 5.39,5.39 36.8,0 -5.89,0 29.22,0 2.98,0 5.39,-2.41 5.39,-5.39l0 -29.22c0,-2.98 -2.41,-5.39 -5.39,-5.39zm-2.87 13.97l0.02 0.79c0,8.01 -6.09,17.24 -17.24,17.24 -3.42,0 -6.61,-1 -9.29,-2.72 0.47,0.05 0.96,0.08 1.44,0.08 2.85,0 5.46,-0.97 7.53,-2.59 -2.65,-0.05 -4.89,-1.8 -5.66,-4.21 0.37,0.07 0.75,0.1 1.14,0.1 0.56,0 1.09,-0.07 1.6,-0.2 -2.77,-0.56 -4.86,-3.01 -4.86,-5.95l0 -0.07c0.82,0.45 1.75,0.72 2.74,0.76 -1.62,-1.09 -2.69,-2.94 -2.69,-5.05 0,-1.11 0.29,-2.15 0.81,-3.04 2.99,3.67 7.46,6.08 12.5,6.33 -0.11,-0.44 -0.16,-0.91 -0.16,-1.38 0,-3.35 2.72,-6.06 6.06,-6.06 1.74,0 3.32,0.74 4.43,1.91 1.38,-0.27 2.67,-0.77 3.84,-1.47 -0.45,1.42 -1.41,2.61 -2.66,3.36 1.22,-0.15 2.39,-0.48 3.48,-0.96 -0.81,1.22 -1.84,2.28 -3.03,3.13z"></path>
									</svg></a><a class="social__link">
							<svg class="social__icon" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="40px" height="40px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd;" viewBox="0 0 40 40" xmlns:xlink="http://www.w3.org/1999/xlink">
										<path d="M34.61 0l-29.22 0c-2.98,0 -5.39,2.41 -5.39,5.39l0 29.22c0,2.98 2.41,5.39 5.39,5.39 34.45,0 6.45,0 29.22,0 2.98,0 5.39,-2.41 5.39,-5.39l0 -29.22c0,-2.98 -2.41,-5.39 -5.39,-5.39zm-3.67 19.65c0,6.03 -4.91,10.94 -10.94,10.94 -6.03,0 -10.94,-4.91 -10.94,-10.94 0,-1.45 0.29,-2.84 0.81,-4.11l-5.97 0 0 16.38c0,2.11 1.72,3.83 3.83,3.83l24.54 0c2.11,0 3.83,-1.72 3.83,-3.83l0 -16.38 -5.97 0c0.52,1.27 0.81,2.66 0.81,4.11zm4.43 -8.62l0 -5.9 0 -0.88 -0.88 0.01 -5.9 0.02 0.03 6.78 6.75 -0.03zm-15.37 15.66c3.88,0 7.04,-3.16 7.04,-7.04 0,-1.54 -0.5,-2.95 -1.33,-4.11 -1.28,-1.77 -3.36,-2.93 -5.71,-2.93 -2.35,0 -4.42,1.16 -5.7,2.93 -0.84,1.16 -1.33,2.57 -1.34,4.1 0,3.89 3.16,7.05 7.04,7.05z"></path>
									</svg></a><a class="social__link">
							<svg class="social__icon" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="40px" height="40px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd;" viewBox="0 0 40 40" xmlns:xlink="http://www.w3.org/1999/xlink">
										<path d="M34.61 0l-29.22 0c-2.98,0 -5.39,2.41 -5.39,5.39l0 29.22c0,2.98 2.41,5.39 5.39,5.39l6.54 0c-0.87,-7.24 1.64,-12.75 2.82,-18.59 -2.06,-3.47 0.25,-10.46 4.61,-8.74 5.35,2.12 -4.64,12.92 2.06,14.26 7.01,1.41 9.87,-12.15 5.52,-16.56 -6.28,-6.37 -18.26,-0.14 -16.79,8.97 0.36,2.23 2.66,2.91 0.92,5.98 -4.02,-0.89 -5.21,-4.05 -5.06,-8.28 0.25,-6.91 6.21,-11.75 12.19,-12.42 7.57,-0.85 14.66,2.78 15.64,9.89 1.11,8.03 -3.41,16.73 -11.49,16.1 -2.2,-0.17 -3.12,-1.25 -4.84,-2.3 -0.88,4.64 -1.95,9.1 -4.89,11.69l21.99 0c2.98,0 5.39,-2.41 5.39,-5.39l0 -29.22c0,-2.98 -2.41,-5.39 -5.39,-5.39z"></path>
									</svg></a></nav>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="footer-widget">
					<div class="feedback"><span class="feedback__title">Есть вопросы?</span><span class="feedback__content">Мы Вам перезвоним</span>
						<form>
							<input class="feedback__input" type="text" placeholder="имя">
							<input class="feedback__input" type="tel" placeholder="номер телефона">
							<button class="feedback__submit" type="submit">Перезвонить</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="return-to-top"><i class="rtt-icon glyphicon glyphicon-menu-up"></i></div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
