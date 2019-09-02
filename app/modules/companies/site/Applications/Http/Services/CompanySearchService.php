<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Services;

use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\SubcategoryRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * Class CompanySearchService
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanySearchService
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * @var LogSearchPhoneService
     */
    private $logSearchPhoneService;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var SubcategoryRepository
     */
    private $subcategoryRepository;

    /**
     * CompanySearchService constructor.
     * @param CompanyRepository $companyRepository
     * @param CategoryRepository $categoryRepository
     * @param SubcategoryRepository $subcategoryRepository
     * @param LogSearchPhoneService $logSearchPhoneService
     * @internal param LogSearchPhoneService $logSearchPhoneService
     */
    public function __construct(CompanyRepository $companyRepository,
                                CategoryRepository $categoryRepository,
                                SubcategoryRepository $subcategoryRepository,
                                LogSearchPhoneService $logSearchPhoneService)
    {

        $this->companyRepository = $companyRepository;
        $this->categoryRepository = $categoryRepository;
        $this->subcategoryRepository = $subcategoryRepository;
        $this->logSearchPhoneService = $logSearchPhoneService;

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {

        $collection = collect([]);

        $data = [
            'search' => strip_tags($request->get('q')),
            'state_id' => intval($request->get('state')),
            'city_id' => intval($request->get('city')),
            'category_id' => intval($request->get('category')),
            'subcategory_id' => intval($request->get('subcategory')),
            'page' => intval($request->get('page'))
        ];

        if (validate_is_phone_number($data['search'])) {

            $data['number_phone'] = tools_only_numbers($data['search']);
            $companies = $this->companyRepository->searchPerTelephone($data);
            if ($companies !== false) {
                foreach ($companies as $value) {
                    $collection->push($value->id);
                }
            }

        }

        $data['search'] = tools_sanitize_search($data['search']);

        $categories = $this->categoryRepository->searchCategoryExistsReturnIds($data);

        if ($categories !== false && is_array($categories)) {
            $data['ids'] = $categories;
            $companies = $this->companyRepository->searchCategoriesIds($data);
            if ($companies !== false) {
                foreach ($companies as $value) {
                    $collection->push($value->id);
                }
            }
        }

        $subcategories = $this->subcategoryRepository->searchSubcategoryExistsReturnIds($data);
        if ($subcategories !== false && is_array($subcategories)) {

            $data['ids'] = $subcategories;
            $companies = $this->companyRepository->searchSubcategoriesIds($data);
            if ($companies !== false) {
                foreach ($companies as $value) {
                    $collection->push($value->id);
                }
            }
        }



        $companies = $this->companyRepository->searchCompanies($data, true);

        if ($companies !== false) {
            if ($companies !== false) {
                foreach ($companies as $value) {
                    $collection->push($value->id);
                }
            }
        }

        $companies = $this->companyRepository->searchCompanies($data, false);
        if ($companies !== false) {
            if ($companies !== false) {
                foreach ($companies as $value) {
                    $collection->push($value->id);
                }
            }
        }

        $collection->unique();
        $unique = $collection->unique();
        $data['companies_ids'] = $unique->values()->all();

        $companies = $this->companyRepository->filterCompaniesPerIds($data, false);

        if ($companies !== false) {
            $this->logSearch($data, $companies->total());           
            return $companies;
        }

        $this->logSearch($data, 0);
        return [];

    }

    /**
     * Add data log
     * @param $data
     * @param $total
     * @return bool|mixed
     */
    private function logSearch($data, $total)
    {
        $data['total'] = $total;
        return $this->logSearchPhoneService->LogSearch($data);
    }

}
