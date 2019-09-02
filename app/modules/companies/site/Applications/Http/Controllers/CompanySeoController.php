<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\State\StateRepository;
use GuiaLocaliza\Companies\Site\Applications\Http\Utils\SeoMetaDataUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use SEOMeta;

/**
 * Class CompanySeoController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanySeoController extends BaseController
{

    use SeoMetaDataUtils;


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

    private $district_name;
    private $abbr;
    private $city_name;
    private $city_id;

    private function mountUrlSeo($company)
    {
        $this->abbr= '';
        if(isset($company->state->abbr)):
            $this->abbr = $company->state->abbr;
        endif;

        $this->city_name = '';
        $this->city_id = '';
        if(isset($company->city->name)):
            $this->city_name  = $company->city->name;
            $this->city_id  = $company->city->id;
        endif;

        $this->district_name = '';
        if(isset($company->district->name)):
            $this->district_name = $company->district->name;
        endif;

        $url = asset( tools_slug_title_companies($this->abbr, $this->city_id, $this->city_name, $this->district_name, $company->name_fantasy, $company->id));

        if( URL::full() !== $url) {
            return $url;
        }

        return false;

    }

    public function companyPage(Request $request)
    {

        $data = [];
        $data['states'] = $this->stateRepository->stateActive();
        $data['company'] = $company = $this->companyRepository->getIdCompany($request->route('company_id'));

        if(!$company) {
            return Redirect::to(url('error/404'), 301);
        }

        $url_redirect = $this->mountUrlSeo( $company );
        if($url_redirect !== false) {
            return Redirect::to($url_redirect, 301);
        }

        if(!empty($company->tag_title)) {
            $title = $company->tag_title;
        } else {

            if(!empty($this->district_name)) {
                $title = sprintf('%s em %s, %s, %s', $company->name_fantasy, $this->district_name, $this->city_name, $this->abbr );
            } else {
                $title = sprintf('%s em %s, %s', $company->name_fantasy, $this->city_name, $this->abbr);
            }

        }

        if(!empty($company->tag_description)) {
            $description = $company->tag_description;
        } else {

            $category_name = '';
            foreach($company->categories as $category):
                if (isset($category->id)):
                   $category_name = $category->name;
                endif;
            endforeach;

            $description = sprintf(
                'Localize o Telefone e o Endereço de %s especializado em %s, no endereço %s%s em %s, %s.',
                $company->name_fantasy,
                $category_name,
                !empty( $place_name ) ? $place_name : ' ',
                !empty( $this->district_name ) ? ' - '. $this->district_name : ' ',
                $company->city->name,
                $this->abbr
            );

            $description = str_replace("  ", " ", $description);

        }

        $this->metaData( $title, $description );

        return $this->view('companies.modules.page-company.result', $data);

    }


    /**
     * Search data companies
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function search(Request $request)
    {

        $v = Validator::make($request->all(), [
            'q' => 'required|max:255',
            'city' => 'required'
        ]);

        if ($v->fails()) {
            return redirect()
                ->back()
                ->withErrors($v->errors());
        }

        $start = microtime();
        $data = [];
        $data['states'] = $this->stateRepository->stateActive();
        $companies = $this->companySeoCityCategoryService->search($request);
        $data['companies'] = $companies;
        $data['time'] = toots_calculate_start($start);
        return $this->view('companies.modules.search.result', $data);

    }

}
