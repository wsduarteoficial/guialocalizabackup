<?php
$this->name('all')->get('/listar/{id?}', 'UserController@listAll');
$this->name('create')->get('/criar', 'UserController@create');
$this->name('create.post')->post('/criar/post', 'UserController@createPost');
$this->name('edit')->get('/edit/{id}/', 'UserController@edit');
$this->name('edit.post')->post('/edit/post/{id}/', 'UserController@editPost');
$this->name('remove')->get('/remove/{id}/', 'UserController@delete');
