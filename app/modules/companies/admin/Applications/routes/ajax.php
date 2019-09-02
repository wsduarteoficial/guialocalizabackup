<?php
$this->name('user.update.status')->get('/user/update/status/', 'UserAjaxController@updateStatus');
$this->name('user.remove')->get('/user/remove/', 'UserAjaxController@remove');

$this->name('page.update.status')->get('/page/update/status/', 'PageAjaxController@updateStatus');
$this->name('page.remove')->get('/page/remove/', 'PageAjaxController@remove');

$this->name('company.active')->get('/company/update/status/active/', 'CompanyAjaxController@active');
$this->name('company.remove')->get('/company/remove/', 'CompanyAjaxController@remove');

$this->name('plan.active')->get('/plan/active/', 'PlanAjaxController@active');

$this->name('state.active')->get('/state/active/', 'StateAjaxController@active');
$this->name('state.update.status')->get('/state/update/status/', 'StateAjaxController@updateStatus');

$this->name('city.active')->get('/city/active/', 'CityAjaxController@active');
$this->name('city.update.status')->get('/city/update/status/', 'CityAjaxController@updateStatus');
$this->name('city.register')->get('/city/register/', 'CityAjaxController@register');
$this->name('city.edit')->get('/city/edit/', 'CityAjaxController@edit');
$this->name('city.remove')->get('/city/remove/', 'CityAjaxController@remove');

$this->name('category.active')->get('/category/active/', 'CategoryAjaxController@active');
$this->name('category.register')->get('/category/register/', 'CategoryAjaxController@register');
$this->name('category.update')->get('/category/update/', 'CategoryAjaxController@update');
$this->name('category.remove')->get('/category/remove/', 'CategoryAjaxController@remove');

$this->name('subcategory.active')->get('/subcategory/active/', 'SubcategoryAjaxController@active');
$this->name('subcategory.register')->get('/subcategory/register/', 'SubcategoryAjaxController@register');
$this->name('subcategory.update')->get('/subcategory/update/', 'SubcategoryAjaxController@update');
$this->name('subcategory.remove')->get('/subcategory/remove/', 'SubcategoryAjaxController@remove');
$this->name('subcategory.listPerCategory')->get('/subcategory/filter/per/category/', 'SubcategoryAjaxController@getListSubcategoriesPerCategoryId');

$this->name('district.update.status')->get('/district/update/status/', 'DistrictAjaxController@updateStatus');
$this->name('district.register')->get('/district/register/', 'DistrictAjaxController@register');
$this->name('district.edit')->get('/district/edit/', 'DistrictAjaxController@edit');
$this->name('district.remove')->get('/district/remove/', 'DistrictAjaxController@remove');
$this->name('district.city.all')->get('/district/city/all/', 'DistrictAjaxController@getByIdCityAll');

$this->name('place.update.status')->get('/place/update/status/', 'PlaceAjaxController@updateStatus');
$this->name('place.register')->get('/place/register/', 'PlaceAjaxController@register');
$this->name('place.edit')->get('/place/edit/', 'PlaceAjaxController@edit');
$this->name('place.remove')->get('/place/remove/', 'PlaceAjaxController@remove');
$this->name('place.city.all')->get('/place/city/all/', 'PlaceAjaxController@getByIdCityAll');

$this->name('zipcode.update.status')->get('/zipcode/update/status/', 'ZipcodeAjaxController@updateStatus');
$this->name('zipcode.register')->get('/zipcode/register/', 'ZipcodeAjaxController@register');
$this->name('zipcode.edit')->get('/zipcode/edit/', 'ZipcodeAjaxController@edit');
$this->name('zipcode.remove')->get('/zipcode/remove/', 'ZipcodeAjaxController@remove');
$this->name('zipcode.remove')->get('/zipcode/remove/', 'ZipcodeAjaxController@remove');

$this->name('client.check')->get('/client/check/cpf_cnpj/', 'ClientAjaxController@cpfCnpj');
$this->name('client.check.email')->get('/client/check/email/', 'ClientAjaxController@email');

$this->name('address.zipcode')->get('/address/check/zipcode/', 'ApiAddressAjaxController@zipCode');

$this->name('phone.check')->get('/phone/check/', 'PhoneAjaxController@existsNumber');
$this->name('phone.remove')->get('/phone/remove/item/', 'PhoneAjaxController@removeItem');

$this->name('phone.remove')->get('/gallery/photo/remove/', 'GalleryAjaxController@removeItem');
