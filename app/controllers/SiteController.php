<?php

namespace app\controllers;

use app\models\Banner;
use app\models\News;
use app\models\ServiceCategory;
use Yii;
use yii\filters\AccessControl;
use app\components\BaseController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends BaseController {
	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only'  => [ 'logout' ],
				'rules' => [
					[
						'actions' => [ 'logout' ],
						'allow'   => true,
						'roles'   => [ '@' ],
					],
				],
			],
			'verbs'  => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'logout' => [ 'post' ],
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
//    public function actions()
//    {
//        return [
//            'error' => [
//                'class' => 'yii\web\ErrorAction',
//            ],
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
//        ];
//    }

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {
		$content['news']             = News::find()->joinWith( 'info' )->orderBy( 'date DESC' )->limit( 3 )->all();
		$content['service_category'] = ServiceCategory::find()->joinWith( 'info' )->orderBy( 'sort DESC' )->all();
		$content['banner']           = Banner::find()->where(['active'=>1])->joinWith( 'info' )->orderBy( 'sort DESC' )->all();

		foreach ($content['news'] as $news)
		{
			$news->date=$this->changeDate($news->date);
		}

		return $this->render( 'index', [ 'content' => $content ] );
	}


	/**
	 * Displays contact page.
	 *
	 * @return string
	 */
	public function actionContacts() {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
		return $this->render( 'contacts', [
//            'model' => $model,
		] );
	}

	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout() {
		return $this->render( 'about' );
	}
}
