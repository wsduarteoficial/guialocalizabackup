<?php
$this->name('page.sitemap')->get('/{abbr?}', 'CompanySeoController@companyPage');
$this->name('page.view.admin')->get('/mode/view/{company_id}', 'CompanySeoController@companyPage');
$this->name('page')->get('/{abbr?}/{city_id}/{city_name?}/{company_id}/{company_name}', 'CompanySeoController@companyPage');
$this->name('page.district')->get('/{abbr?}/{city_id}/{city_name?}/{city_district?}/{company_id}/{company_name}', 'CompanySeoController@companyPage');
