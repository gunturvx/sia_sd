<?php

function validateUser($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username Dibutuhkan');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email Dibutuhkan');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password Dibutuhkan');
    }

    if ($user['passwordConf'] !== $user['password']) {
        array_push($errors, 'Password tidak sama');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email sudah ada');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email sudah ada');
        }
    }

    return $errors;
}


function validateLogin($user)
{
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'Username dibutuhkan');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Username dibutuhkan');
    }

    return $errors;
}