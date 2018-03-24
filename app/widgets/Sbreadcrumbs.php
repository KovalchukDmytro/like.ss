<?php
namespace app\widgets;
use Yii;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;





class Sbreadcrumbs extends Breadcrumbs
{	

 
		

    public $tag = "ol";
    public $options = ['class' => 'b-breadcrumbs__list'];
    public $itemTemplate = "<li class=\"b-breadcrumbs__item\" itemscope=\"\" itemtype=\"http://data-vocabulary.org/Breadcrumb\">{link}</li>";
    public $activeItemTemplate = "<li class=\"b-breadcrumbs__item\" itemscope=\"\" itemtype=\"http://data-vocabulary.org/Breadcrumb\">{link}</li>";
    public $encodeLabels = false;

    /**
     * Renders the widget.
     */
    public function run()
    {
		//var_dump($q=Yii::$app->request->headers);
		$k=substr(Yii::$app->language,0,2);
		if($k=='kk'){$str='Интернет дүкен Вагонка';}
		elseif($k=='en'){$str='Online shop Vagonka';}
		else{$str='Интернет магазин Вагонка';} 
		
		
        if (empty($this->links)) {
            return;
        }
	
        $links = [];
        if ($this->homeLink === null) {
            $links[] = $this->renderItem([
                'label' => $str,
                'url' => Yii::$app->homeUrl,
                'itemprop' => 'url'
            ], $this->itemTemplate);
        } elseif ($this->homeLink !== false) {
            $links[] = $this->renderItem($this->homeLink, $this->itemTemplate);
        }
		//var_dump($this->links);
        foreach ($this->links as $link) {
            if (!is_array($link)) {
                $link = ['label' => $link];
            }
			
            $links[] = $this->renderItem($link, isset($link['url']) ? $this->itemTemplate : $this->activeItemTemplate);
        }
        
        // делаем последнюю крошку некликабельной
        $last = array_pop($links);
        $last = strip_tags($last);
        $last = "<li class=\"b-breadcrumbs__item\">".$last."</li>";
        $links[] = $last;
        
        echo Html::tag($this->tag, implode('', $links), $this->options);
    }

}