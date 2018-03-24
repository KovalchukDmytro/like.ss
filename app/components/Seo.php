<?php
namespace app\components;

use app\models\Lang;

class Seo
{
    public static $meta = FALSE;

    public static function init()
    {
        if (self::$meta === FALSE)
        {
            //	Массив мета-тегов для страницы
            self::$meta = [
                    'title' => '',
                    'description' => '',
                    'h1' => '',
//                    'h2' => '',
                    'text' => '',
//                    'robots' => ''
            ];

            //	Ручные значения тегов из админки
            $url = $_SERVER['REQUEST_URI'];
            $url = preg_replace('#^'.preg_quote(Lang::getCurrentUrl(), '#').'#', '/', $url);
            $static = \app\models\Seo::find()->joinWith('info', true)
                    ->andWhere(['url' => $url, 'type' => 'static'])
                    ->asArray()
                    ->limit(1)
                    ->one();
            if ($static && isset($static['info']))
            {
                self::$meta = $static['info'];
            }
            
            if ($static && isset($static['info']['cannonical']))
            {
                \Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => \yii\helpers\Url::to($static['info']['cannonical'], true)]);
            }
            
        }
    }

    //	Получить текущее значение тега
    public static function get($tag = 'h1')
    {
        self::init();
        
        if (isset(self::$meta[$tag]))
        {
            return self::$meta[$tag];
        }

        return NULL;
    }

    //	Установаить значение тега
    public static function set($tag, $value)
    {
        self::init();
        
        if (isset(self::$meta[$tag]) && !strlen(trim(self::$meta[$tag])))
        {
            self::$meta[$tag] = $value;
        }
    }

    //	Утсновить значения всех тегов по шаблону
    public static function setByTemplate($template, $data)
    {
        self::init();
        $template = \app\models\Seo::find()->innerJoinWith(['info'], true)
                ->andWhere(['url' => $template, 'type' => 'template'])->asArray()->one();

        if ($template && isset($template['info']))
        {
            foreach ($template['info'] as $tag => $value)
            {
                if (is_array($data) && count($data))
                {
                    foreach ($data as $key => $name)
                    {
                        $value = preg_replace('#\{+\s*'.$key.'\s*\}+#', $name, $value);
                    }
                }
                self::set($tag, $value);
            }
        }
    }
}