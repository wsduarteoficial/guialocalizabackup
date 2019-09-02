<?php
$this->name('company.plans')->get('/empresa/planos', 'ReportPlansController@filter');
$this->name('company.plans.view')->get('/empresa/planos/visualizar', 'ReportPlansController@report');

$this->name('company.registers')->get('/empresa', 'ReportCompaniesController@filter');
$this->name('company.registers.view')->get('/empresa/visualizar', 'ReportCompaniesController@report');

$this->name('company.status')->get('/empresa/status', 'ReportCompaniesStatusActiveController@filter');
$this->name('company.status.view')->get('/empresa/status/visualizar', 'ReportCompaniesStatusActiveController@report');

$this->name('company.clicks')->get('/empresa/cliques', 'ReportCompaniesClicksController@filter');
$this->name('company.clicks.view')->get('/empresa/cliques/visualizar', 'ReportCompaniesClicksController@report');

$this->name('company.payments')->get('/empresa/vencimentos', 'ReportCompaniesPayController@filter');
$this->name('company.payments.view')->get('/empresa/vencimentos/visualizar', 'ReportCompaniesPayController@report');

$this->name('company.search')->get('/busca', 'ReportCompaniesSearchController@filter');
$this->name('company.search.view')->get('/busca/visualizar', 'ReportCompaniesSearchController@report');
