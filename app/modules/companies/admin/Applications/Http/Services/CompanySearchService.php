<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Company\EloquentCompanyRepository;
use Illuminate\Http\Request;

/**
 * Class CompanySearchService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 06/09/17
 * File: CompanySearchService.php
 */
class CompanySearchService
{
    /**
     * @var EloquentCompanyRepository
     */
    private $repository;

    /**
     * CompanySearchService constructor.
     * @param EloquentCompanyRepository $repository
     */
    public function __construct(EloquentCompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {

        $data = [
            'search' => strip_tags($request->get('name_fantasy')),
            'active' => strip_tags($request->get('active')),
            'number_phone' => strip_tags($request->get('number_phone')),
            'phone_type' => strip_tags($request->get('phone')),
            'plan_id' => strip_tags($request->get('plan')),
            'state_id' => intval($request->get('state')),
            'city_id' => intval($request->get('city')),
            'category_id' => intval($request->get('category')),
            'page' => intval($request->get('page'))
        ];

        if (validate_is_phone_number($data['search'])) {

//            $data['number_phone'] = tools_only_numbers($data['search']);
//            $companies = $this->repository->searchPerTelephone($data);
//            if ($companies !== false) {
//                $this->logSearch($data, $companies->total());
//                return $companies;
//            }

        }

//        $data['search'] = tools_sanitize_search($data['search']);
//
//        $categories = $this->categoryRepository->searchCategoryExistsReturnIds($data);
//
//        if ($categories !== false && is_array($categories)) {
//
//            $data['ids'] = $categories;
//            $companies = $this->repository->searchCategories($data);
//            if ($companies !== false) {
//                $this->logSearch($data, $companies->total());
//                return $companies;
//            }
//        }
//
//        $subcategories = $this->subcategoryRepository->searchSubcategoryExistsReturnIds($data);
//        if ($subcategories !== false && is_array($subcategories)) {
//            $data['ids'] = $subcategories;
//            $companies = $this->repository->searchSubcategories($data);
//            if ($companies !== false) {
//                $this->logSearch($data, $companies->total());
//                return $companies;
//            }
//        }
//
//        $companies = $this->repository->searchCompanies($data, true);
//        if ($companies !== false) {
//            $this->logSearch($data, $companies->total());
//            return $companies;
//        }

        $companies = $this->repository->listSearch($data, true);
        if ($companies !== false) {
            return $companies;
        }

    }
}
