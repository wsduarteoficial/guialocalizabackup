<?php
$this->name('all')->get('/', 'PagesController@pages');
$this->name('create')->get('/criar', 'PagesController@pagesCreate');
$this->name('create.post')->post('/criar/post', 'PagesController@pagesCreatePost');
$this->name('edit')->get('/{id}/editar', 'PagesController@pagesEdit');
$this->name('edit.post')->post('/editar/{id}/post', 'PagesController@pagesEditPost');
$this->name('remove')->get('/delete/{id}', 'PagesController@pagesRemove');
