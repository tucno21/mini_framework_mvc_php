<?php

d($login);

if (isset($data)) {
    d($data);
}

d(session()->has('message'));
d(session()->get('message'));

d(route('login'));

echo 'desde la vista auth/login';
