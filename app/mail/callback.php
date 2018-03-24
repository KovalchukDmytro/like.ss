<?php

echo '<h4>Получена новая заявка на обратный звонок!</h4>';

if(isset($data['cb_name']) && !empty($data['cb_name']))
{
    echo '<p>Имя пользователя: '.trim(strip_tags($data['cb_name'])).'</p>';
}

if(isset($data['cb_phone']) && !empty($data['cb_phone']))
{
    echo '<p>Email пользователя: '.trim(strip_tags($data['cb_phone'])).'</p>';
}

echo '<p>Дата создания: '.gmdate('Y-m-d G:i:s', date('U')).'</p>';