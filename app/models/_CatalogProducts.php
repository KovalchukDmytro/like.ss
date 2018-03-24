<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "catalog_products".
 *
 * @property integer               $id
 * @property string                $name_alt
 * @property double                $price
 * @property integer               $hide
 * @property integer               $recom
 * @property string                $also_ids
 * @property integer               $creation_time
 * @property integer               $update_time
 * @property integer               $sort
 * @property integer               $cat_id
 *
 * @property CatalogProductsInfo[] $catalogProductsInfos
 */
class CatalogProducts extends \yii\db\ActiveRecord
{
    private $images = [];

	/**
	 * @inheritdoc
	 */
    public static function tableName()
    {
            return 'catalog_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
            ['alias', 'price', 'hide', 'recom', 'also_ids', 'creation_time', 'update_time', 'sort', 'cat_id'],
            'required',
            ],
            [['price', 'price_old'], 'number'],
            [['hide', 'sort','banner_link', 'filename', 'format', 'recom', 'creation_time', 'update_time', 'sort', 'cat_id', 'carrency_id', 'show_in_banner', 'product_of_day'], 'integer'],
            [['alias', 'also_ids'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'             => 'ID',
            'alias'          => 'Наименование для УРЛ латиницей (сгенерируется автоматом)',
            'price'          => 'Стоимость',
            'hide'           => 'Скрыть',
            'recom'          => 'Рекомендованый товар',
            'show_in_banner' => 'Популярный (слайдер)',
            'banner_link'    => 'Ссылка на баннер (сертификат)',
            'filename'       => 'Имя файла (сертификат)',
            'format'         => 'формат файла (сертификат)',
            'product_of_day' => 'Товар дня',
            'also_ids'       => 'Товары, которые рекомендуются покупать вместе с данным (ID товаров через запятую, пример: 545,567)',
            'creation_time'  => 'Date of creation',
            'update_time'    => 'Date of update',
            'sort'           => 'Сорт',
            'cat_id'         => 'Находится в разделе',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProductsInfos()
    {
        return $this->hasMany(CatalogProductsInfo::className(), ['record_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\Queries\CatalogProducts the active query used by this AR class.
     */
    public static function find()
    {
        $p = new \app\models\Queries\CatalogProducts(get_called_class());
        return $p->joinWith(['info','extraparams'], true)->andWhere([self::tableName().'.hide' => 0]);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\Queries\CatalogProducts the active query used by this AR class.
     */
    public static function search()
    {
        $p = new \app\models\Queries\CatalogProducts(get_called_class()); 
        return $p->andWhere([self::tableName().'.hide' => 0]);
    }

    //	Метод добавляет в массив $data информацию о параметрах и доставке товаров
    public static function findParams($products, $data = [], $prefix = '')
    {
        $data[$prefix.'ids'] = [];
        $data[$prefix.'params'] = [];
        $data[$prefix.'delivery'] = [];

        if (is_array($products) && count($products))
        {
            //	Список ID товаров
            foreach ($products as $product)
            {
                $data[$prefix.'ids'][] = $product->id;
            }
            //	Значения параметров для отображаемых товаров
            $data[$prefix.'params'] = ExtraParamsCache::getProductParams($data[$prefix.'ids']);
            //	Сроки доставки для отображаемых товаров
            $data[$prefix.'delivery'] = ExtraParamsCache::getProductDelivery($data[$prefix.'ids']);
        }

        return $data;
    }

    public function getInfo()
    {
        return $this->hasOne(CatalogProductsInfo::className(), ['record_id' => 'id'])
                ->where([CatalogProductsInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }

    public function getInfos()
    {
        return $this->hasMany(CatalogProductsInfo::className(), ['record_id' => 'id'])
                ->where([CatalogProductsInfo::tableName() . '.lang' => Lang::getCurrentId()]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLabel()
    {
        return $this->hasOne(ProductLabels::className(), ['id' => 'label_id']);
    }

    public function getExtraparams()
    {
        return $this->hasMany(ExtraParamsCache::className(), ['product_id' => 'id'])
                        ->select([
                            'product_id',
                            'param_id',
                            'in_filter',
                            'value_id',
                            'param_name' => 'param_name_'.Lang::$current->id,
                            'param_name_alt',
                            'value_name' => 'value_name_'.Lang::$current->id
                        ])
//                    ->orderBy('param_id DESC')
                    ->asArray();
    }
    public function getCategory()
    {
        return $this->hasOne(CatalogCategories::className(), ['id' => 'cat_id']);
            }

    public function getFeedbacks()
    {
        return $this->hasMany(Feedbacks::className(), ['item_id' => 'id'])->andWhere(['feedbacks.status' => 1])->orderBy(['creation_time' => 'ASC']);
    }


//    public function getDelivery()
//    {
//        foreach ($this->extraparams as $param)
//        {
//            if ($param['param_name_alt'] == 'srok_dostavki')
//            {
//                return $param['value_name'];
//            }
//        }
//
//        return '';
//    }
//
//    public function getGiftActive()
//    {
//        if (strlen($this->gift_articul) && $this->gift_end_date >= date('Y-m-d'))
//        {
//            return TRUE;
//        }
//
//        return FALSE;
//    }

    public function getFullPrice()
    {
        return $this->price;
    }

    //	Расчёт скидочной цены на товар
//    public function getUserPrice()
//    {
//        $user_discount = $this->price;
//        $self_discount = $this->price;
//
//        //	Скидка для авторизованных пользователей
//        $user = User::getCurrent();
//        if ($user->id > 0)
//        {
//            //	Скидка по сумме прошлых заказов
//            $discount = $user->getDiscount();
//            if ($discount > 0)
//            {
//                $user_discount = $this->price - ($this->price - $this->price_min) * $discount;
//                if ($user_discount < $this->price_min)
//                {
//                    $user_discount = $this->price_min;
//                }
//            }
//
//            //	Минимальная скидка для зарегистрированных пользователей
//            if ($this->price_max > 0 && $this->price_max < $user_discount)
//            {
//                $user_discount = $this->price_max;
//            }
//        }
//
//        //	Индивидуальная товарная скидка по формуле
//        if (strlen($this->discount_formula) && date('Y-m-d') < $this->discount_end_date && preg_match('#^([\d\.,]+)([%]?)([ipWN]*)$#', $this->discount_formula, $matches) && count($matches) == 4)
//        {
//            //	В $matches содержится массив вида ['2%NW', '2', '%', 'NW'], по элементам которого и определяются параметры скидки
//            $matches[1] = (float)str_replace(',', '.', $matches[1]);
//            //	Выясняю, подходящее ли сейчас время для скидки
//            $now = TRUE;
//            //	Скидка в выходные дни
//            if (strstr($matches[3], 'W') && !in_array(date('w'), [0, 6]))
//            {
//                $now = FALSE;
//            }
//            //	Ночная скидка (с 19:30 до 07:30)
//            if (strstr($matches[3], 'N') && date('H:i') > '07:30' && date('H:i') <= '19:30')
//            {
//                $now = FALSE;
//            }
//            //	Скидка по IP (действует для всех, кроме посетителей из Киева)
//            if (strstr($matches[3], 'ip') && mb_strtolower(User::getIPCity(), 'UTF-8') == 'киев')
//            {
//                $now = FALSE;
//            }
//
//            if ($now && $matches[1] > 0)
//            {
//                //	Процентная скидка
//                if ($matches[2] == '%')
//                {
//                    $self_discount = $this->price * (100 - $matches[1]) / 100;
//                }
//                //	Абсолюткая скидка
//                else
//                {
//                    $self_discount = $this->price - $matches[1];
//                }
//            }
//        }
//
//        $price = min($user_discount, $self_discount);
//        if ($price < $this->price_min)
//        {
//            $price = $this->price_min;
//        }
//
//        if ($price < $this->price && $this->price_old <= $this->price)
//        {
//            $this->price_old = round($this->price);
//        }
//
//        return round($price);
//    }

    public function getUrl()
    {

       
        return Url::toRoute(['/'.$this->category->name_alt.'/'.$this->alias], true);
    }

    public function getImg()
    {
        $images = $this->searchImages();
        if (isset($images['b']) && is_array($images['b']) && count($images['b']))
        {
            foreach ($images['b'] as $pos => $path)
            {
                $images['b'][$pos] = Url::toRoute(['/product/image', 'alias' => $this->alias, 'number' => $pos]);
            }
        }
        return $images['b'];
    }

    public function getBImgS()
    {
        $images = $this->searchImages();
        return $images['b'];
    }

    public function getSImgS()
    {
        $images = $this->searchImages();
        return $images['s'];
    }
    
    public function getBImg()
    {
        $fname = '/images/' . $this->tableName() . '/' . floor($this->id / 1000) .'/' . $this->tableName() . '.'. $this->id . '.1.b.jpg';
        if (is_file(__DIR__ . '/../..' . $fname))
        {
            return $fname;        
        } 
        else 
        {
            return '/images/no-img.png';
        }
    }

    public function getSImg()
    {
        $fname = '/images/' . $this->tableName() . '/' . floor($this->id / 1000) .'/' . $this->tableName() . '.'. $this->id . '.1.s.jpg';
        if (is_file(__DIR__ . '/../..' . $fname))
        {
            return $fname;        
        } 
        else 
        {
            return '/images/no-img.png';
        }
    }
    public function getImgs() {
        $i = 1;
        $res = [];
        $table_name = $this->tableName();
        while($i <= 8){
          //  var_dump(is_file($_SERVER['DOCUMENT_ROOT'].'/images/'. $table_name.'/' . floor($this->id / 1000) .'/' . $table_name.'.'. $this->id.".$i.b.jpg"));die();
            if(is_file($_SERVER['DOCUMENT_ROOT'].'/images/'. $table_name.'/' . floor($this->id / 1000) .'/' . $table_name.'.'. $this->id.".$i.b.jpg"))
            {
                $res[] =  [
                    'bimg' => '/images/'. $table_name.'/'. floor($this->id / 1000) .'/' . $table_name.'.'. $this->id.".$i.b.jpg",
                    'simg' => '/images/'. $table_name.'/'. floor($this->id / 1000) .'/' . $table_name.'.'.$this->id.".$i.s.jpg",
                ];
            }
            elseif($i == 1)
            {
                $res[] = '/images/no-img.png';
            }
            $i++;
        }
        return $res;
    }
    public function searchImages()
    {
        if (!$this->images)
        {
            $this->images = [
                's' => [],
                'b' => []
            ];

            //  Основные фото товаров
            $i = 1;
            while ($i < 5)
            {
                $fname = '/images/' . $this->tableName() . '/' . floor($this->id / 1000) .'/' . $this->tableName() . '.'. $this->id . '.'.$i.'.b.jpg';
                if (is_file(__DIR__ . '/../..' . $fname))
                {
                    $this->images['b'][] = $fname;
                    $this->images['s'][] = str_replace('.b.', '.s.', $fname);
                }
                $i++;
            }

            if (!count($this->images['s']))
            {
                $this->images['b'][] = '/images/no-img.png';
                $this->images['s'][] = '/images/no-img.png';
            }
        }

        return $this->images;
    }

    //валюта товара
    public function getCurrency()
    {
        return $this->hasOne(Currences::className(), ['id' => 'carrency_id']);
    }

    //валюта товара базовая
    public function getIscurcur()
    {
        return Currences::current() == $this->currency;
    }

    //цена в базовой валюте
    public function getSprice()
    {
        //base product
        if ($this->base_id == 0)
        {
            if ($this->iscurcur)
            { //если валюта по умолчанию
                return $this->price;
            }
            else
            { //пересчитываем
                return $this->price * $this->currency->coef;
            }
        }
        else
        {
            if ($this->parent->iscurcur)
            { //если валюта по умолчанию
                return $this->price;
            }
            else
            { //пересчитываем
                return $this->price * $this->parent->currency->coef;
            }
        }
    }

    //files
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['record_id' => 'id'])->where([Files::tableName() . '.table_name' => $this::tableName()]);
    }

    //mods names
//    public function getMname()
//    {
//        if ($this->base_id == 0)
//        {
//            return $this->info->name;
//        }
//        else
//        {
//            $parent = CatalogProducts::find()->byId($this->base_id)->limit(1)->one();
//            return $parent->info->name . ' (' . $this->info->name . ')';
//        }
//    }

    //mods
//    public function getMods()
//    {
//        if ($this->base_id == 0)
//        {
//            $mods = CatalogProducts::find()->byBaseId($this->id)->orderBy('sort')->all();
//            if ($mods)
//            {
//                return $mods;
//            }
//            else
//            {
//                return FALSE;
//            }
//        }
//        else
//        {
//            return FALSE;
//        }
//    }

    //parent
//    public function getParent()
//    {
//        $parent = CatalogProducts::find()->byId($this->base_id)->limit(1)->one();
//        return $parent;
//    }

}