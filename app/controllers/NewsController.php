<?php

namespace app\controllers;
use Yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\News;
use app\components\Seo;
use yii\data\Pagination;


class NewsController extends \app\components\BaseController
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
	    $query=News::find()->joinWith('info');
        $query_count=$query->count();
        $pages = new Pagination(['totalCount' =>$query_count , 'pageSize' => 3]);
        $news=$query->offset($pages->offset)->limit($pages->limit)->orderBy('date desc')->all();
        return $this->render('index', [
            'models'  => $news,
	        'pages' => $pages
        ]);
    }

    public function actionView($alias)
    {
        Seo::setByTemplate('default', [

            'name' => 'Sartorius',
        ]);
        $model=News::find()->byAlias($alias)->joinWith('info')->limit(1)->one();

        return $this->render('view.php', [
            'model'  => $model

        ]);
    }

}