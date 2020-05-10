<?php

    $data = $_POST;

    if ( isset($data['b_signup']) ) {

        $errors = array();

        if ( trim($data['login']) == '' ) {
            $errors[] = 'Введите login!';
        }

        if ($data['login'] == $_SESSION['logged_user']->login) {
            if ( R::count('users', "login = ?", array($data['login'])) > 0 ) {
                $errors[] = 'Пользователь с таким логином уже существует!';
            }
        }

        if ( empty($errors) ) {

            $user = R::dispense('users');
            $user->login = $data['login'];
            $cat = R::load('login', $id);
            $cat->login = $data['login'];
            R::store($cat);
            header('Location: /');
            exit();

        } else {
            echo '<div class="register_error">'.array_shift($errors).'</div>';
        }
    }
?>