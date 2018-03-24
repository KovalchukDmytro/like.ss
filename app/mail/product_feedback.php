<?php

echo '<h4>Получен новый заказ номера!</h4>';

if(isset($data['name']) && !empty($data['name']))
{
    echo '<p>Имя пользователя: '.trim(strip_tags($data['name'])).'</p>';
}
if(isset($data['surname']) && !empty($data['surname']))
{
    echo '<p>Фамилия: '.trim(strip_tags($data['surname'])).'</p>';
}
if(isset($data['phone']) && !empty($data['phone']))
{
    echo '<p>Номер телефона пользователя: '.trim(strip_tags($data['phone'])).'</p>';
}
if(isset($data['email']) && !empty($data['email']))
{
    echo '<p>Email пользователя: '.trim(strip_tags($data['email'])).'</p>';
}
if(isset($data['departure']) && !empty($data['departure']))
{
    echo '<p>Дата заезда: '.trim(strip_tags($data['departure'])).'</p>';
}
if(isset($data['arrival']) && !empty($data['arrival']))
{
    echo '<p>Дата выезда: '.trim(strip_tags($data['arrival'])).'</p>';
}
if(isset($data['adult']) && !empty($data['adult']))
{
    echo '<p>Количество взрослых: '.trim(strip_tags($data['adult'])).'</p>';
}
if(isset($data['child']) && !empty($data['child']))
{
    echo '<p>Количество детей: '.trim(strip_tags($data['child'])).'</p>';
}
if(isset($data['child-1']) && !empty($data['child-1']))
{
    echo '<p>Лет первому ребенку: '.trim(strip_tags($data['child-1'])).'</p>';
}
if(isset($data['child-2']) && !empty($data['child-2']))
{
    echo '<p>Лет второму ребенку: '.trim(strip_tags($data['child-2'])).'</p>';
}
if(isset($data['child-3']) && !empty($data['child-3']))
{
    echo '<p>Лет третему ребенку: '.trim(strip_tags($data['child-3'])).'</p>';
}
if(isset($data['child-4']) && !empty($data['child-4']))
{
    echo '<p>Лет четвертому ребенку: '.trim(strip_tags($data['child-4'])).'</p>';
}
if(isset($data['type']) && !empty($data['type']))
{
    echo '<p>Желанный номер: '.trim(strip_tags($data['type'])).'</p>';
}
if(isset($data['packet']) && !empty($data['packet']))
{
    echo '<p>Спец предложение: '.trim(strip_tags($data['packet'])).'</p>';
}
if(isset($data['comment']) && !empty($data['comment']))
{
    echo '<p>Комментарий к заказу: '.trim(strip_tags($data['comment'])).'</p>';
}

