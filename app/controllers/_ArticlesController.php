<?php

namespace app\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\Articles;
use app\components\Seo;
use yii\data\Pagination;


class ArticlesController extends \app\components\BaseController
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
        $query=Articles::find()->active()->joinWith('info');
        $query_count=$query->count();
        $pages = new Pagination(['totalCount' =>$query_count , 'pageSize' => 1]);
        $articles=$query->offset($pages->offset)->limit($pages->limit)->orderBy('sort desc, custom_date desc')->all();
        return $this->render('index.twig', [
            'articles'  => $articles,
            'pages' => $pages,

        ]);
    }

    public function actionView($alias)
    {
        Seo::setByTemplate('default', [

            'name' => 'Sartorius',
        ]);
        $news=Articles::find()->active()->byAlias($alias)->joinWith('info')->limit(1)->one();

        return $this->render('view.twig', [
            'news'  => $news

        ]);
    }

}