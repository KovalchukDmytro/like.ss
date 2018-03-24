<?php

namespace app\components;

use app\models\Canon;

//use app\models\User\User;
use Yii;
use app\models\CatalogCategories;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Lang;
use app\models\Slovar;
use app\models\Redirect;

class BaseController extends \yii\web\Controller {
	public $default_content;

	public function init() {
		parent::init();
		//var_dump( \app\models\SeoNew::find()->limit( 1 )->one()->info->title );

		$lang                          = Lang::getCurrent();
		$this->view->params['lang']    = $lang;
		$this->view->params['lang_sh'] = mb_substr( ( $lang->name ), 0, 3, 'utf-8' );
		$sort                          = $lang->id == 1 ? 'asc' : 'desc';
		$langs                         = Lang::find()->orderBy( 'id ' . $sort )->all();
		$this->view->params['langs']   = $langs;
		$current_url                   = Yii::$app->request->pathinfo;

//var_dump(substr($_SERVER['REQUEST_URI'], 0,-1)); die();

		if (substr($_SERVER['REQUEST_URI'],-1)=='/' && $_SERVER['REQUEST_URI']!='/')
		{

			return $this->redirect(substr($_SERVER['REQUEST_URI'], 0,-1), 301)->send();
		}
		if (strstr($_SERVER['REQUEST_URI'],'/ru')!==false)
		{
			return $this->redirect(Url::toRoute(str_replace('/ru','/',$_SERVER['REQUEST_URI'])), 301)->send();
		}
		if (strstr($_SERVER['REQUEST_URI'],'//')!==false)
		{
			return $this->redirect(str_replace('//','/',$_SERVER['REQUEST_URI']), 301)->send();
		}
		/*$news = \app\models\News::find()->all();
		foreach ($news as $new)
		{
			var_dump($new->info->title);
		}
		die();*/
		//var_dump($this->url_origin(true)); die();

		 $slovar =  Slovar::find()
				 ->leftJoin('`slovar_info`', '`slovar_info`.`record_id` = `slovar`.`id`')
				 ->select(['`slovar`.`alias`', '`slovar_info`.`value`'])
				 ->where(['`slovar_info`.`lang`' => Lang::getCurrentId()])
				 ->asArray()
				 ->all();

		 $slovar = ArrayHelper::map($slovar, 'alias', 'value');
		$this->view->params = array_merge($this->view->params, $slovar);
		 if($lang->by_default)
		 {
			 $this->view->params['lang_url'] = '';
			 Yii::$app->homeUrl = $this->view->params['home_url']='/';
			 $this->view->params['current_url'] = $current_url ? "/{$current_url}": '/';
		 }
		 else
		 {
			 $this->view->params['lang_url']="/{$lang->url}/";
			 Yii::$app->homeUrl = $this->view->params['home_url']="/{$lang->url}/";
			 $this->view->params['current_url']="/{$lang->url}/{$current_url}";
		 }


		/* Yii::$app->view->registerMetaTag([
			 'name'    => 'robots',
			 'content' => 'NOINDEX, NOFOLLOW'
		 ]);*/


		if ( isset( $_GET['page'] ) && ! empty( $_GET['page'] ) && (int) $_GET['page'] > 1 ) {
			Yii::$app->view->registerMetaTag( [
				'name'    => 'robots',
				'content' => 'NOINDEX, FOLLOW'
			] );
		}
	}

	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
//				'view'  => '@app/views/site/404.php',
			],
		];
	}

	protected function full_url( $use_forwarded_host = false ) {
		return $this->url_origin( $use_forwarded_host ) . $_SERVER['REQUEST_URI'];
	}

	protected function url_origin( $use_forwarded_host = false ) {
		$s        = $_SERVER;
		$ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
		$sp       = strtolower( $s['SERVER_PROTOCOL'] );
		$protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
		$port     = $s['SERVER_PORT'];
		$port     = ( ( ! $ssl && $port == '80' ) || ( $ssl && $port == '443' ) ) ? '' : ':' . $port;
		$host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
		$host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;

		return $protocol . '://' . $host;
	}
} 