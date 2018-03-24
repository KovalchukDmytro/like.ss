<?php

echo '<h4>Получена новая заявка на консультацию!</h4>';

if(isset($data['ord_name']) && !empty($data['ord_name']))
{
    echo '<p>Имя пользователя: '.trim(strip_tags($data['ord_name'])).'</p>';
}

if(isset($data['ord_email']) && !empty($data['ord_email']))
{
    echo '<p>Email пользователя: '.trim(strip_tags($data['ord_email'])).'</p>';
}

if(isset($data['ord_phone']) && !empty($data['ord_phone']))
{
    echo '<p>Номер телефона пользователя: '.trim(strip_tags($data['ord_phone'])).'</p>';
}

if(isset($data['ord_material']) && !empty($data['ord_material']))
{
    echo '<p>Комментарий: '.trim(strip_tags($data['ord_material'])).'</p>';
}


echo '<p>Дата создания: '.gmdate('Y-m-d G:i:s', date('U')).'</p>';