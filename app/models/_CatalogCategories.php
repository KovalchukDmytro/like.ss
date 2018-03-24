<?php

namespace app\models;

use Yii;
use yii\helpers\Url;
use app\components\behavior\ImgBehavior;

/**
 * This is the model class for table "catalog_categories".
 *
 * @property integer $id
 * @property integer $hide
 * @property string $name_alt
 * @property integer $sort
 * @property integer $no_del
 * @property integer $parent_id
 * @property integer $creation_time
 * @property integer $update_time
 * @property string $also_ids
 *
 * @property CatalogCategoriesInfo[] $catalogCategoriesInfos
 */
class CatalogCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hide', 'name_alt', 'sort', 'no_del', 'parent_id', 'creation_time', 'update_time', 'also_ids'], 'required'],
            [['hide', 'hide_horizontal','sort', 'no_del', 'parent_id', 'creation_time', 'update_time'], 'integer'],
            [['name_alt', 'also_ids'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hide' => Yii::t('app', 'Скрыть'),
            'hide_horizontal' => Yii::t('app', 'Скрыть в горизонтальном меню на главной'),
            'name_alt' => Yii::t('app', 'Название для УРЛ латиницей (сгенерируется автоматом)'),
            'sort' => Yii::t('app', 'Сортировка'),
            'no_del' => Yii::t('app', 'Не удалять'),
            'parent_id' => Yii::t('app', 'Находится в разделе'),
            'creation_time' => Yii::t('app', 'Date of creation'),
            'update_time' => Yii::t('app', 'Date of update'),
            'also_ids' => Yii::t('app', 'Товары, которые рекомендуются покупать вместе (ID товаров через запятую, пример: 545,567)'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogCategoriesInfos()
    {
        return $this->hasMany(CatalogCategoriesInfo::className(), ['record_id' => 'id']);
    }

    public function behaviors() {
        return [
            'thumb' => [
                'class' => ImgBehavior::className(),
            ],
        ];
    }

    public function getIdsForCatalog() {
        if($this->parent_id == -1){
            $ids = $this->selfChildsGrandchildsIds;
        }
        else{
            $ids = $this->selfAndChildsIds;
        }
        
        return $ids;
    }
    
    public function getChilds()
    {
        return $this->hasMany(self::className(), ['parent_id' => 'id'])->orderBy("sort ASC");
    }
    
    public function getSelfAndChildsIds()
    {
        $res = [];
        $res[] = $this->id;
//        $childs = $this->childs;
        $query = new \yii\db\Query();
        $childs = $query->select(['id'])->from(self::tableName())->where(['parent_id' => $this->id])->all();
        
        foreach ($childs as $ch) {
            $res[] = $ch['id'];            
        }
        return $res;
    }

    public function getSelfChildsGrandchildsIds()
    {
        $res = [];
        $res[] = $this->id;
//        $childs = $this->childs;
        $query = new \yii\db\Query();
        $childs = $query->select(['id'])->from(self::tableName())->where(['parent_id' => $this->id])->all();
        if(is_null($childs))
        {
            return $this->id;
        }
        foreach ($childs as $ch) {
            $res[] = $ch['id'];
            $child_ids[] = $ch['id'];
//            $gchilds = $ch->childs;
        }
        $gchilds = $query->select(['id'])->from(self::tableName())->where(['parent_id' => $child_ids])->all();
        foreach ($gchilds as $gch) {
            $res[] = $gch['id'];
        }
        
        return $res;
    }

    public function getProductsCount()
    {
        return CatalogProducts::find()->select('id')->active()->base()->byCategoryIds($this->selfAndChildsIds)->count();
    }

    public function getInfo()
    {
        return $this->hasOne(CatalogCategoriesInfo::className(), ['record_id'=>'id'])->onCondition([CatalogCategoriesInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }

    public function getInfos()
    {
        return $this->hasMany(CatalogCategoriesInfo::className(), ['record_id'=>'id'])->onCondition([CatalogCategoriesInfo::tableName().'.lang' => Lang::getCurrentId()]);
    }

    //files
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['record_id' => 'id'])->where([Files::tableName() . '.table_name' => $this::tableName()]);
    }
    
    public function getFile()
    {
        if($this->files)
        {
            $file = $this->files[0];
            return '/userfiles/'.$file->format.'/'.$file->filename;    
        }
        else
        {
            return false;
        }
    }

    public function getUrl()
    {
        return Url::to(['/'.$this->name_alt], true);
    }


    public function getSubUrl()
    {
        $parent = self::getDb()->cache(function ($db){
            return parent::find()->andWhere(['id' => $this->parent_id])->limit(1)->one();
        });

        if(is_null($parent))
        {
            return $this->url;    
        }
        else
        {
            return Url::to(['/'.$parent->name_alt.'/'.$this->name_alt], true);    
        }
    }

    public function getParent()
    {
        return $this::find()->byId($this->parent_id)->limit(1)->one();
        //return $this->hasOne($this::className(), ['id' => 'parent_id'])->andWhere('id>0');
    }

    /**
     * @inheritdoc
     * @return \app\models\Queries\CatalogCategories the active query used by this AR class.
     */
    public static function find()
    {
        $c =  new \app\models\Queries\CatalogCategories(get_called_class());
//        $c = $c->leftJoin('catalog_categories_info', '`catalog_categories_info`.`record_id` = `catalog_categories`.`id`');
//        $c = $c->where(['catalog_categories_info.lang' => Lang::getCurrentId()]);
        return $c->joinWith(['info'], true)->with(['childs']);
    }
    
    /**
     * @inheritdoc
     * @return \app\models\Queries\CatalogCategories the active query used by this AR class.
     */
    public static function search()
    {
        return new \app\models\Queries\CatalogCategories(get_called_class());
    }
}