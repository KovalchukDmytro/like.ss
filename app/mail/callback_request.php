<?php

echo '<h4>Получена новая заявка на обратный звонок! (со страницы "Контакты")</h4>';

if(isset($data['cbf_name']) && !empty($data['cbf_name']))
{
    echo '<p>Имя пользователя: '.trim(strip_tags($data['cbf_name'])).'</p>';
}

if(isset($data['cbf_email']) && !empty($data['cbf_email']))
{
    echo '<p>Email пользователя: '.trim(strip_tags($data['cbf_email'])).'</p>';
}

if(isset($data['cbf_phone']) && !empty($data['cbf_phone']))
{
    echo '<p>Номер телефона пользователя: '.trim(strip_tags($data['cbf_phone'])).'</p>';
}

if(isset($data['cbf_comment']) && !empty($data['cbf_comment']))
{
    echo '<p>Комментарий: '.trim(strip_tags($data['cbf_comment'])).'</p>';
}


echo '<p>Дата создания: '.gmdate('Y-m-d G:i:s', date('U')).'</p>';