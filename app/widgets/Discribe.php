<?php
namespace app\widgets;

use app\models\EmailCategories;

class Discribe extends \yii\base\Widget
{
    public function run()
    {
        $catalog = EmailCategories::find()->orderBy('sort desc')
            ->all();
//   var_dump($menu);die();
//var_dump(Yii::$app->user->identity->parent_id);
        return $this->render('discribe/view.twig', [
            'catalog'        => $catalog,
        ]);
    }
}