<?php

echo '<h4>Получен новый отзыв о компании!</h4>';

if(isset($data['tsm_name']) && !empty($data['tsm_name']))
{
    echo '<p>Имя пользователя: '.trim(strip_tags($data['tsm_name'])).'</p>';
}

if(isset($data['tsm_email']) && !empty($data['tsm_email']))
{
    echo '<p>Email пользователя: '.trim(strip_tags($data['tsm_email'])).'</p>';
}

if(isset($data['tsm_phone']) && !empty($data['tsm_phone']))
{
    echo '<p>Номер телефона пользователя: '.trim(strip_tags($data['tsm_phone'])).'</p>';
}

if(isset($data['tsm_rating']) && !empty($data['tsm_rating']))
{
    echo '<p>Рейтинг: '.trim(strip_tags($data['tsm_rating'])).'</p>';
}

if(isset($data['tsm_comment']) && !empty($data['tsm_comment']))
{
    echo '<p>Комментарий: '.trim(strip_tags($data['tsm_comment'])).'</p>';
}

echo '<p>Дата создания: '.gmdate('Y-m-d G:i:s', date('U')).'</p>';