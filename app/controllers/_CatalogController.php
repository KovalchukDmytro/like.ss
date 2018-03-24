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
use app\models\ExtraParamsCache;
use app\components\Seo;




class CatalogController extends \app\components\BaseController
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'products' => ['get'],
                    'catalog' => ['get'],
                    'category'  => ['get'],
                ]
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionProducts()
    {
        Seo::setByTemplate('default', [

            'name' => 'Продукция',
        ]);

        $menu = CatalogCategories::find()->andWhere(['parent_id'=>-1])->joinWith('info')->all();
        if(empty($menu))
        {
            throw new NotFoundHttpException();
        }
        return $this->render('products.twig', [
            'menu' => $menu

        ]);
    }

    public function actionCatalog($alias)
    {


        $menu = CatalogCategories::find()->byAlias(trim($alias))->joinWith('info')->limit(1)->one();
        if(empty($menu))
        {
            throw new NotFoundHttpException();
        }
        Seo::setByTemplate('default', [
            'name' => $menu->info->name,
        ]);

        return $this->render('catalog.twig', [
            'menu' => $menu

        ]);
    }
    public function actionCategory($alias,$filter="")
    {
        if (!preg_match("#^[aA-zZ0-9\-_]+$#",$alias)) {
            throw new NotFoundHttpException();
        }

        $category = CatalogCategories::find()->byAlias($alias)->joinWith('info')->limit(1)->one();
        if(empty($category)){
            throw new NotFoundHttpException();
        }
        $idsForCatalog = $category->idsForCatalog;
        //	Все значения фильтра в текущей категории
        $filt = ExtraParamsCache::getCategoryFilter($idsForCatalog, $filter);
        $selected = ExtraParamsCache::getSelected($filt);

        $query = CatalogProducts::find()
            ->orderBy('sort DESC')
            ->groupBy('`catalog_products`.`alias`')
            ->active()
            ->byCategoryIds($idsForCatalog);

        //	Количество всех товаров в категории
        $count_total = $query->count();
        //	Количество выбранных товаров
        $count_current = $count_total;

        if ($selected)
        {
            //	Фильтрация товаров
            $query = $query->byFilter($selected);
            $count_current= $query->count();
        }

        //	Постраничная навигация
        $pages = new Pagination(['totalCount' => $count_current, 'pageSize' => 1]);

        //	Товары на странице
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        if(empty($products)){return $this->render('empty.twig',['category'=>$category]);}


        if(!empty($selected))
        {
            $filter_text = '';
            //var_dump($selected['product_id']);die();
            $temp='';
            foreach ($selected as $filter_param)
            {
                //var_dump($filter_param);
                if($temp==$filter_param['param_name'])
                {
                    $filter_text .=$filter_param['value_name'].', ';
                    Yii::$app->view->registerMetaTag([
                        'name' => 'robots',
                        'content' => 'NOINDEX,NOFOLLOW'
                    ]);
                }
                else
                {
                    $filter_text .=$filter_param['param_name'].':'.$filter_param['value_name'].', ';

                }
                $temp=$filter_param['param_name'];
            }
            $filter_text = rtrim($filter_text, ", ");

            Seo::setByTemplate('default', [
                'name'   => $category->info->name.' '.$filter_text,

            ]);
          //  var_dump($filter);
            // это тоже часть СЕО-оптимизации
            $filter_array = explode('-or-', $filter);
          //  var_dump($filter_array);
           /* if(count($filter_array) > 1) {
                Yii::$app->view->registerMetaTag([
                    'name' => 'robots',
                    'content' => 'NOINDEX,NOFOLLOW'
                ]);
            }*/
        }
        else
        {
            Seo::setByTemplate('default', [
                'name' => $category->info->name,
            ]);
        }

            return $this->render('category.twig', [
                'category' => $category,
                'filter' => $filt,
                'pages' => $pages,
                'products' => $products,
               


        ]);

    }
}