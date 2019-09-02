<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Domains\Models\State\StateRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Applications\Http\Utils\SeoMetaDataUtils;
use GuiaLocaliza\Companies\Site\Applications\Http\Services\CompanySeoCityCategoryService;

use Illuminate\Http\Request;

class MapsSeoController extends BaseController
{

    use SeoMetaDataUtils;

    /**
     * @var StateRepository
     */
    private $stateRepository;

    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var companySeoCityCategoryService
     */
    private $companySeoCityCategoryService;


    public function __construct(StateRepository $stateRepository,
                                CityRepository $cityRepository,
                                CompanySeoCityCategoryService $companySeoCityCategoryService,
                                CategoryRepository $categoryRepository)
    {
        $this->stateRepository = $stateRepository;
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->companySeoCityCategoryService = $companySeoCityCategoryService;


    }

    public function sitemap(Request $request)
    {

        $data = [];
        $data['states'] = $this->stateRepository->stateActive();

        $title = 'Mapa do Site - GuiaLocaliza.com.br';
        $description = 'Navegue pelo Mapa do Site em Guialocaliza e encontre telefones e endereços de empresas';

        $this->metaData($title, $description );

        return $this->view('companies.modules.sitemap.result-state', $data);

    }

    public function sitemapStateCity(Request $request)
    {

        $data = [];
        $data['states'] = $this->stateRepository->stateActive();

        $title = 'Mapa do Site - Estado: '. strtoupper( $request->route('abbr') );
        $description = 'Navegue pelo Mapa do Site em '.  strtoupper( $request->route('abbr') ) .' e encontre telefones e endereços de empresas';

        $this->metaData( $title, $description );

        return $this->view('companies.modules.sitemap.result-city', $data);

    }


    public function sitemapCitiesState(Request $request)
    {

        $data = [];
        $data['cities'] = $this->cityRepository->citiesWithCompaniesActives( strtoupper( $request->route('abbr') ) );

        $title = 'Mapa do Site - Cidades no Estado de '. strtoupper( $request->route('abbr') );
        $description = 'Navegue pelo Mapa do Site, cidades em '.  strtoupper( $request->route('abbr') ) .' e encontre telefones e endereços de empresas';

        $this->metaData( $title, $description );

        return $this->view('companies.modules.sitemap.result-city', $data);

    }

    public function sitemapCategoriesCitiesState(Request $request)
    {

        $data = [];
        $data['categories'] = $this->categoryRepository->categoriesWithCompaniesActives( $request->route('city_id') );

        $data['city'] = $city = $this->cityRepository->find( $request->route('city_id') );

        if( isset( $city->name ) && !empty($city->name)) {
            $title = 'Mapa do Site - Categorias na cidade de '. $city->name .' em '. strtoupper( $request->route('abbr') );
            $description = 'Navegue pelo Mapa do Site em Categorias na cidade de '. $city->name .' em '.  strtoupper( $request->route('abbr') ) .' e encontre telefones e endereços de empresas';

        } else {
            $title = 'Mapa do Site - Categorias no estado de '. strtoupper( $request->route('abbr') );
            $description = 'Navegue pelo Mapa do Site em Categorias no estado de '.  strtoupper( $request->route('abbr') ) .' e encontre telefones e endereços de empresas';
        }

        $this->metaData( $title, $description );

        return $this->view('companies.modules.sitemap.result-categories', $data);

    }


    public function sitemapCompaniesCategory(Request $request)
    {

        $data = [];
        $data['states'] = $this->stateRepository->stateActive();
        $data['companies'] = $this->companySeoCityCategoryService->list($request);
        $data['city'] = $city = $this->cityRepository->find( $request->route('city_id') );
        $data['category'] = $category =  $this->categoryRepository->find( $request->route('category_id') );

        $title = '';
        if( isset( $category->name ) && !empty($category->name ) ) {
            $title .= sprintf('%s', $category->name );
        }

        if( isset( $city->name ) && !empty( $city->name ) ) {
            $title .= sprintf(' em %s', $city->name );
        }

        if( $request->route('abbr') ) {
            $title .= sprintf(', %s', strtoupper( $request->route('abbr') ) );
        }

        $description = sprintf('Localize aqui %s em %s, %s', @$category->name, @$city->name, strtoupper( @$request->route('abbr') ) );
        $this->metaData( @$title, @$description );

        return $this->view('companies.modules.sitemap.result-companies-category', $data);

    }

}
