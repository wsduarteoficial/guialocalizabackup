<?php

$this->get('/solicitation', function() {
    return view('email.notifications.full.solicitation');
});

$this->name('index')->get('/', 'HomeController@index');

$this->name('error.404')->get('/error/404', 'ErrorController@error404');
$this->name('error.500')->get('/error/500', 'ErrorController@error500');

$this->name('solicitation.change')->get('/solicitar/alteracao/{uuid}/{url}', 'SolicitationController@viewPage');
$this->name('solicitation.change.post')->post('/solicitation/sendmail', 'SolicitationController@sendMail');

$this->name('contact')->get('/fale-conosco', 'ContactController@viewPage');
$this->name('contact.site')->post('/contact/sendmail', 'ContactController@sendMail');
$this->name('contact.company')->post('/contact/company/sendmail', 'ContactCompanyController@sendMail');

$this->name('advertise')->get('/anuncie', 'AdvertiseController@advertise');
$this->name('advertise-free')->get('/anuncie-gratis', 'AdvertiseController@advertiseFree');

$this->name('sitemap')->get('/sitemap.xml', 'SitemapController@pages');

$this->name('sitemap.seo')->get('/mapa-do-site', 'MapsSeoController@sitemap');
$this->name('sitemap.seo.cities.state')->get('/{abbr}', 'MapsSeoController@sitemapCitiesState');
$this->name('sitemap.seo.categories.cities')->get('/{abbr}/{city_id}/{city_name}/', 'MapsSeoController@sitemapCategoriesCitiesState');
$this->name('sitemap.seo.category.companies')->get('/{abbr?}/{city_id?}/{city_name?}/{category_id}/{category_name}', 'MapsSeoController@sitemapCompaniesCategory');

