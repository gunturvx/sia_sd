<?php


function validatePost($post)
{
    $errors = array();

    if (empty($post['title'])) {
        array_push($errors, 'Judul Dibutuhkan');
    }

    if (empty($post['body'])) {
        array_push($errors, 'Body is required');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Topic Dibutuhkan');
    }

    $existingPost = selectOne('posts', ['title' => $post['title']]);
    if ($existingPost) {
        if (isset($post['update-post']) && $existingPost['id'] != $post['id']) {
            array_push($errors, 'Article dengan judul yang sama sudah ada');
        }

        if (isset($post['add-post'])) {
            array_push($errors, 'Article dengan judul yang sama sudah ada');
        }
    }

    return $errors;
}