<?php


function generateRandomPassword($length)
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
    $password = '';
    $chars_length = strlen($chars) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[rand(0, $chars_length)];
    }

    return $password;
};
