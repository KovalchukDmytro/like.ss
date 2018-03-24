<?php

echo '<h4>Получена новая заявка на обратный звонок! (со страницы "Контакты")</h4>';

if(isset($data['oco_name']) && !empty($data['oco_name']))
{
    echo '<p>Имя пользователя: '.trim(strip_tags($data['oco_name'])).'</p>';
}

if(isset($data['oco_phone']) && !empty($data['oco_phone']))
{
    echo '<p>Номер телефона пользователя: '.trim(strip_tags($data['oco_phone'])).'</p>';
}

if(isset($data['product_url']) && !empty($data['product_url']))
{
    echo '<p>Ссылка на товар: '.trim(strip_tags($data['product_url'])).'</p>';
}

echo '<p>Дата создания: '.gmdate('Y-m-d G:i:s', date('U')).'</p>';