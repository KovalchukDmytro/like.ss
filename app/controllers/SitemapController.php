<?php

namespace app\controllers;
use Yii;
use app\models\ExtraParamsCache;
use app\models\Pages;
use app\models\CatalogCategories;
use app\models\CatalogProducts;
use app\models\Articles;
use app\models\ArticlesCategories;
use app\models\Discount;
use app\models\DiscountCategories;
use app\models\Room;
use app\models\News;
use app\models\Projects;
use app\models\Shares;

class SitemapController extends \yii\web\Controller
{
	public function actionIndex()
    {
        $this->layout = 'sitemap_layout';
        $host = Yii::$app->request->hostInfo;
		header('Content-type: text/xml');
		$response = Yii::$app->response;
		$response->format = \yii\web\Response::FORMAT_RAW;
		$response->headers->set('Content-Type', 'text/xml');
        /* Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'text/xml'); */
        $urls = [];

        
        // Article Categories
        $articles_categories = ArticlesCategories::find()->all();
        foreach ($articles_categories as $article){
			if(substr($article->url,-1)!='/')
			{
            $urls[] = $article->url.'/';
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$article->url.'/');
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$article->url.'/');
			}
			else
			{
			$urls[] = $article->url;
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$article->url);
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$article->url);
			}
        }
		// Article 
        $articles = Articles::find()->all();
        foreach ($articles as $article){
          if(substr($article->url,-1)!='/')
			{
            $urls[] = $article->url.'/';
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$article->url.'/');
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$article->url.'/');
			}
			else
			{
			$urls[] = $article->url;
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$article->url);
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$article->url);
			}
        }
		// Discount Categories
        $discounts_categories = DiscountCategories::find()->all();
        foreach ($discounts_categories as $discount){
           if(substr($discount->url,-1)!='/')
			{
            $urls[] = $discount->url.'/';
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$discount->url.'/');
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$discount->url.'/');
			}
			else
			{
			$urls[] = $discount->url;
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$discount->url);
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$discount->url);
			}
        }
		// Discount 
        $discounts = Discount::find()->all();
        foreach ($discounts as $discount){
           if(substr($discount->url,-1)!='/')
			{
            $urls[] = $discount->url.'/';
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$discount->url.'/');
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$discount->url.'/');
			}
			else
			{
			$urls[] = $discount->url;
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$discount->url);
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$discount->url);
			}
        }
		// Room 
        $rooms = Room::find()->all();
        foreach ($rooms as $room){
            $urls[] = $room->url;
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/en/',$room->url);
			$urls[] = str_replace('http://test5.digitalforce.ua/','http://test5.digitalforce.ua/uk/',$room->url);
		
        }
        
        
 
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        foreach ($urls as $url){
            echo '<url>
                <loc>' . $url . '</loc>
                <changefreq>daily</changefreq>
                <priority>1.0</priority>
            </url>';
        }
        echo '</urlset>';   
        Yii::$app->end();                 
    }
	
    

    
}
