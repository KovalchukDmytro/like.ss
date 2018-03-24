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

class _BaseController extends \yii\web\Controller
{
    public $default_content;

     protected function url_origin( $use_forwarded_host = false )
    {
        $s        = $_SERVER;
        $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
        $sp       = strtolower( $s['SERVER_PROTOCOL'] );
        $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
        $port     = $s['SERVER_PORT'];
        $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
        $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
        $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
        return $protocol . '://' . $host;
    }

    protected function full_url( $use_forwarded_host = false )
    {
        return $this->url_origin( $use_forwarded_host ) . $_SERVER['REQUEST_URI'];
    }

    public function init()
    {
        parent::init();
       /* $menu=CatalogCategories::find()->all();
        foreach ($menu as $item) {
            var_dump($item->id);
            foreach ($item->childs as $child_item )
            {
                var_dump($child_item->id);
            }
            die();
        }*/


		var_dump(\app\models\SeoNew::find()->limit(1)->one()->info->title);die();
		$this->layout = 'main.twig';
		
		
     
        // Обработка корзины
        $absolute_url = $this->full_url( $_SERVER );
        //var_dump($absolute_url);die();
        $need_redirect = Redirect::find()->where(['redirect.redirect_from' => $absolute_url])->limit(1)->one();

        if($need_redirect) {
            
            return $this->redirect($need_redirect->redirect_to, 301)->send();
        }

	//	var_dump($this->view->params['langs']);
        $lang                               = Lang::getCurrent();
        $this->view->params['lang']         = $lang;
        $this->view->params['lang_sh']      = mb_substr(($lang->name),0,3, 'utf-8');
        $sort= $lang->id==1? 'asc':'desc';
        $langs                              = Lang::find()->orderBy('id '.$sort)->all();
        $this->view->params['langs']        = $langs;
        $current_url                        = Yii::$app->request->pathinfo;

        // request url
		//var_dump($lang);
        
       /* $slovar =  Slovar::find()
                ->leftJoin('`slovar_info`', '`slovar_info`.`record_id` = `slovar`.`id`')
                ->select(['`slovar`.`alias`', '`slovar_info`.`value`'])
                ->where(['`slovar_info`.`lang`' => Lang::getCurrentId()])
                ->asArray()
                ->all();
       
        $slovar = ArrayHelper::map($slovar, 'alias', 'value');

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
		


		//var_dump($discount);
		//var_dump($this->view->params['langs']);
      //  $main_menu_pages = [];
      //  $top_menu_pages = [];

		
	//	$menu_pages =Pages::find()->inMenu()->joinWith(['info'], true)->orderBy('sort')->all();
        /* $menu_pages = Pages::getDb()->cache(function ($db){
            return Pages::find()->inMenu()->joinWith(['info'], true)->orderBy('sort')->all();
        });
 */
       /*  foreach($menu_pages as $menu_page){
            if($menu_page->parent_id == 3){
                $top_menu_pages[] = $menu_page;
            }elseif ($menu_page->parent_id == 4){
                $main_menu_pages[] = $menu_page;
            }
        }
 */
        /* $this->view->params['main_menu_pages'] = $main_menu_pages;
        $this->view->params['top_menu_pages'] = $top_menu_pages;
        $this->view->params['menu_pages'] = $menu_pages;
        $this->view->params['menu_pages_count'] = count($menu_pages); */
        if ($_SERVER['REQUEST_URI']=='/' or $_SERVER['REQUEST_URI']=='/uk')
        {
            $this->view->params['view_script']=1;
        }
       /* Yii::$app->view->registerMetaTag([
            'name'    => 'robots',
            'content' => 'NOINDEX, NOFOLLOW'
        ]);*/

		
		
        if(isset($_GET['page']) && !empty($_GET['page']) && (int)$_GET['page'] > 1)
        {
            Yii::$app->view->registerMetaTag([
                'name'    => 'robots',
                'content' => 'NOINDEX, FOLLOW'
            ]);
        }
		 if(strstr($_SERVER['REQUEST_URI'],'/category/')!==false)
        {
           $this->view->params['canonical']='<link rel="canonical" href="http://www.sunnyresort.com.ua/" />';

        }

    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                'view' => '@app/views/content/404.twig',
            ],
        ];
    }
} 