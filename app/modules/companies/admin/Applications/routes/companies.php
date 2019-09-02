<?php
$this->name('create')->get('/criar', 'CompanyController@create');
$this->name('create.post')->post('/criarPost', 'CompanyController@createPost');
$this->name('active')->get('/listar/ativa', 'CompanyController@listActive');
$this->name('inactive')->get('/listar/inativa', 'CompanyController@listInactive');
$this->name('trashed')->get('/listar/lixeira', 'CompanyController@listTrashed');
$this->name('search')->get('/listar/search', 'CompanyController@search');
$this->name('edit')->get('/{id}/editar', 'CompanyController@edit');
$this->name('edit.post')->post('/{id}/editar/post', 'CompanyController@editPost');
