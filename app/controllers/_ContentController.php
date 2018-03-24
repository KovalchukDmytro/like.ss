<?php

namespace app\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use app\components\MailComponent;
use app\models\CatalogCategories;
use app\models\Articles;
use app\components\Seo;
use app\models\Pages;



class ContentController extends \app\components\BaseController
{
    
    public function behaviors() {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'index'             => ['get','post'],
                    'calculator'        => ['get'],
                    'perform-calculate' => ['post'],
                    'create-callback'   => ['post'],
                    'search'            => ['post'],
                    'one-click-buy'     => ['post'],
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

		$menu=CatalogCategories::find()->joinWith('info')->all();
        $slides=\app\models\MainSlider::find()->joinWith('info')->orderBy('sort DESC')->all();

        return $this->render('index.twig', [
            'menu'  => $menu,
            'slides' => $slides

		]);
    }
    public function actionAbout()
    {
        $page=Pages::find()->byAlias('about')->joinWith('info')->limit(1)->one();
        Seo::setByTemplate('default', [

            'name' => 'Sartorius',
        ]);


        return $this->render('about.twig', [
            'page'  => $page,
        ]);
    }
    public function actionContacts()
    {
        $page=Pages::find()->byAlias('contacts')->joinWith('info')->limit(1)->one();
        Seo::setByTemplate('default', [

            'name' => 'Sartorius',
        ]);


        return $this->render('contacts.twig', [
            'page'  => $page,
        ]);
    }
    public function actionPartners()
    {
        $page=Pages::find()->byAlias('partners')->joinWith('info')->limit(1)->one();
        Seo::setByTemplate('default', [

            'name' => 'Sartorius',
        ]);


        return $this->render('partners.twig', [
            'page'      => $page,
        ]);
    }
        
    public function actionError()
    {
        return $this->render('404.twig', []);
    }
}