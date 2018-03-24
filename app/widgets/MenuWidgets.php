<?php
namespace app\widgets;

use app\models\CatalogCategories;

class MenuWidgets extends \yii\base\Widget
{
public function run()
{
$menu = CatalogCategories::find()->joinWith('info')->orderBy('sort asc')
->all();
//   var_dump($menu);die();
//var_dump(Yii::$app->user->identity->parent_id);
return $this->render('menu/menu.twig', [
'menu'        => $menu,
]);
}
}