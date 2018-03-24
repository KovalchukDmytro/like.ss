<?php

namespace app\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\Catalogs;
use app\components\Seo;
use yii\data\Pagination;


class CatalogsController extends \app\components\BaseController
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
        // var_dump(1);die();
        Seo::setByTemplate('default', [

            'name' => 'Sartorius',
        ]);

        $catalogs=Catalogs::find()->active()->joinWith('info')->orderBy('sort desc, custom_date desc')->all();
        
        return $this->render('index.twig', [
            'catalogs'  => $catalogs,
                   ]);
    }

    public function actionView($alias)
    {
        Seo::setByTemplate('default', [

            'name' => 'Sartorius',
        ]);
        $catalog=Catalogs::find()->active()->byAlias($alias)->joinWith('info')->limit(1)->one();

        return $this->render('view.twig', [
            'catalog'  => $catalog

        ]);
    }

}