<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use app\components\SeoComponent;
use app\models\CatalogProducts;
use yii\data\Pagination;

class SearchController extends \app\components\BaseController
{
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
//                'only'  => ['index', 'category', 'category-by-type'],
                'rules' => [
                    [
                        'actions'   => ['index', 'result'],
                        'allow'     => true,
                        'roles'     => ['?', '@'],
                    ],
                ],
            ],
            'verbs' => [
                'class'     => VerbFilter::className(),
                'actions'   => [
                    'index'                     => ['post','get'],
                    'result'                     => ['get','post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $search=Yii::$app->request->post('search');
        //var_dump($post);die();
        $session             = Yii::$app->session;
        $session['search'] = $search;

        return $this->redirect(['/search/result'], 301);

    }
    public function actionResult()
    {

        $search=Yii::$app->session->get('search');

        $query =CatalogProducts::find()->joinWith('info')->where(['like','catalog_products_info.name',$search]);
        //var_dump($posts);die();

        /*        SeoComponent::setByTemplate('default', [
                    'name' => 'новости',
                ]);*/
        $query_count=$query->count();
        $pages = new Pagination(['totalCount' =>$query_count , 'pageSize' => 1]);
        $posts=$query->offset($pages->offset)->limit($pages->limit)->orderBy('creation_time desc')->all();
        
        /*$breadcrumbs = [];
        $breadcrumbs[] = ['label' => "<span itemprop=\"title\">Блог</span>" ];*/
        if(empty($posts)){return $this->render('empty.twig',['search'=>$search]);}
        return $this->render('index.twig', [
            'search'        => $search,
            'posts'         => $posts,
            'pages'         => $pages,
        ]);
    }



}