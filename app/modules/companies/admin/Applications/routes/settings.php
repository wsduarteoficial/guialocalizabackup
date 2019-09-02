<?php
$this->name('socials')->get('/midias-sociais', 'SettingController@socials');
$this->name('socials.post')->post('/midias-sociais/post', 'SettingController@socialsPost');

$this->name('logos')->get('/logomarca', 'SettingController@logos');
$this->name('logos.post')->post('/logomarca/post', 'SettingController@logosPost');
