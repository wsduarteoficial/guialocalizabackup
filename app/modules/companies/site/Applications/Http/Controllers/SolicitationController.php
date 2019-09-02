<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\State\StateRepository;
use GuiaLocaliza\Companies\Site\Applications\Http\Utils\SeoMetaDataUtils;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use SEOMeta;
use URL;

class SolicitationController extends BaseController
{

    /**
     * @var categoryRepository
     */
    private $categoryRepository;
    
    /**
     * @var companyRepository
     */
    private $companyRepository;

    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * @var StateRepository
     */
    private $stateRepository;


    public function __construct(CategoryRepository $categoryRepository,
                                CompanyRepository $companyRepository,
                                StateRepository $stateRepository,
                                CityRepository $cityRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->companyRepository = $companyRepository;
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;

    }

    public function viewPage(Request $request) {

        SEOMeta::setTitle('Solicitação: Alteração de Dados - GuiaLocaliza.com.br');
        SEOMeta::setDescription( 'Precisa alterar os dados, entre em contato com o Guia Localiza? Nesta página você tem acesso direto com a empresa! Entre em contato conosco.' );
        SEOMeta::setCanonical( URL::current() );

        $data = [];

        $categories= $this->categoryRepository->all();
        $collection = collect($categories);
        $sorted = $collection->sortBy('name');
        $data['categories'] = $sorted->values()->all();
        $data['url_company'] = $request->route('url');
        $data['company'] = $this->companyRepository
                                ->whereFirst(['company_uuid' => $request->route('uuid')]);

        return $this->view('companies.modules.solicitation.index', $data);

    }
    
    public function sendMail(Request $request)
    {

        if( ! $request->ajax() ) {
            return false;
        }

        $data = [
            "name_contact" => $request->input('name_contact'),
            "email_contact" => $request->input('email_contact'),
            "subject_contact" => $request->input('subject_contact'),
            "name_fantasy" => $request->input('name_fantasy'),
            "description" => $request->input('description'),
            "category" => $request->input('category'),
            "phone_fixed" => $request->input('phone_fixed'),
            "phone_cell" => $request->input('phone_cell'),
            "phone_others" => $request->input('phone_others'),
            "address" => $request->input('address'),
            "number" => $request->input('number'),
            "complement" => $request->input('complement'),
            "district" => $request->input('district'),
            "cep" => $request->input('cep'),
            "abbr" => $request->input('abbr'),
            "city" => $request->input('city'),
            "comments" => $request->input('comments'),            
            "url_company" => $request->input('url_company'),
            "company_id" => $request->input('company_id'),
        ]; 

        $send = Mail::send('email.notifications.full.solicitation', $data, function ($message) use ($request){
            $message->from( Config::get('mail.from.address') )
                ->to( Config::get('mail.from.address') )
                ->subject('Solicitação de Alteração - GuiaLocaliza.com.br');
        });
        
    }

}
