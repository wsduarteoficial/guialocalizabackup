<?php
$this->name('phone')->get('/view/phone/', 'ViewPhoneController@viewPhoneNumber');
$this->name('autocomplete')->get('/autocomplete/search/', 'CompanySuggestController@search');
$this->name('ads')->get('/view/make/ads/search/', 'CompanyAdsRelatedController@makeAds');
