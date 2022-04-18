<?php

function validateTopic($topic)
{
    $errors = array();

    if (empty($topic['name'])) {
        array_push($errors, 'Nama topic dibutuhkan');
    }

    $existingTopic = selectOne('topics', ['name' => $post['name']]);
    if ($existingTopic) {
        if (isset($post['update-topic']) && $existingTopic['id'] != $post['id']) {
            array_push($errors, 'Nama sudah ada');
        }

        if (isset($post['add-topic'])) {
            array_push($errors, 'Nama sudah ada');
        }
    }

    return $errors;
}
