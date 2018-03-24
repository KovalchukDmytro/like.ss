<?php

namespace app\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use app\components\MailComponent;
use app\models\CatalogCategories;
use app\models\CatalogProducts;




class ProductController extends \app\components\BaseController
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['get'],
                    'catalog' => ['get'],

                ]
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex($alias,$product)
    {
        /* Seo::setByTemplate('default', [
             'category' => '',
             'name' => 'Sartorius',
         ]);*/

        $category = CatalogCategories::find()->byAlias($alias)->joinWith('info')->limit(1)->one();
        $product  = CatalogProducts::find()->byAlias($product)->joinWith('info')->limit(1)->one();
        //var_dump($product->getImgs());die();
        return $this->render('index.twig', [
            'category' => $category,
            'product'   => $product

        ]);
    }

}