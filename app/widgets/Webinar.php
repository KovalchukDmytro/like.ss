<?php
namespace app\widgets;

use app\models\Articles;

class Webinar extends \yii\base\Widget
{
    public function run()
    {
        $articles = Articles::find()->joinWith('info')->orderBy('sort desc')->limit(2)
            ->all();
//   var_dump($menu);die();
//var_dump(Yii::$app->user->identity->parent_id);
        return $this->render('webinar/view.twig', [
            'articles'        => $articles,
        ]);
    }
}