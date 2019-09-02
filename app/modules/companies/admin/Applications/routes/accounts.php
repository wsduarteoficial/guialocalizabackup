<?php
$this->name('edit')->get('/editar/', 'AccountController@edit');
$this->name('edit.post')->post('/editar/post/', 'AccountController@editPost');
