<?php

namespace app\controllers;
use Yii;
use yii\filters\VerbFilter;
use app\models\Orders;
use app\models\CatalogProducts;
use app\models\Email;
use yii\web\BadRequestHttpException;


class FormController extends \app\components\BaseController
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'pay' => ['get','post'],
                    'discribe' => ['get','post'],
                                  ]
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionPay()
    {
        if(!Yii::$app->request->isAjax)
        {
            throw new BadRequestHttpException();
        }
        $post=Yii::$app->request->post();
        $product=CatalogProducts::find()->byId($post['product_id'])->joinWith('info')->limit(1)->one();
        $model= new Orders();
        $model->name            = isset($post['name']) ? strip_tags($post['name']) : '';
        $model->phone           = isset($post['phone']) ? strip_tags($post['phone']) : '';
        $model->creation_time   = date('U');
        $model->items           = $product->info->name;
        if($model->save()){
            return 'success';
        }
        else{
            foreach ($model->errors as $error)
            {
                return $error[0];
            }
        }
    }
    public function actionDiscribe()
    {   
        if(!Yii::$app->request->isAjax)
        {
            throw new BadRequestHttpException();
        }
        $post=Yii::$app->request->post();
        $model= new Email();
        $model->cat_id            = isset($post['categories']) ? strip_tags($post['categories']) : '';
        $model->email           = isset($post['email']) ? strip_tags($post['email']) : '';
        if($model->save()){
            return 'success';
        }
        else{
            foreach ($model->errors as $error)
            {
                return $error[0];
            }
        }
    }
}