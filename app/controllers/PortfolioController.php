<?php

namespace app\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\PortfolioItem;
use app\components\Seo;
use yii\data\Pagination;


class PortfolioController extends \app\components\BaseController
{

	public function behaviors() {
		return [
			'verbs' => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'index'             => ['get'],

				]
			],
		];
	}

	public function beforeAction($action) {
		$this->enableCsrfValidation = false;
		return parent::beforeAction($action);
	}

	public function actionIndex()
	{
		Seo::setByTemplate('default', [

			'name' => 'Sartorius',
		]);
		$content['models']=PortfolioItem::find()->joinWith('info')->orderBy('sort DESC')->all();

		return $this->render('index', [
			'content'  => $content
		]);
	}

	public function actionView($alias)
	{
		Seo::setByTemplate('default', [

			'name' => 'Sartorius',
		]);
		$content['model']=PortfolioItem::find()->where(['alias'=>$alias])->joinWith('info')->limit(1)->one();
				return $this->render('view', [
			'content'  => $content

		]);
	}
}