<?php
function generateRandomPassword($length, $chars, $allow_repetition = false)
{
    $password = '';

    $chars_length = strlen($chars);

    if ($allow_repetition && $length > $chars_length) {

        while (strlen($password) < $length) {
            $password .= $chars[rand(0, $chars_length - 1)];
        }
    } else {

        $chars_array = str_split($chars);

        //shuffle mischia l'array dei caratteri
        shuffle($chars_array);

        // Seleziona i primi $length (lunghezza desiderata della password) caratteri dall'array mischiato
        $selected_chars = array_slice($chars_array, 0, $length);

        // riunisce i caratteri
        $password = implode('', $selected_chars);
    }

    return $password;
}
