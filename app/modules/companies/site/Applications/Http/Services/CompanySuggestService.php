<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Services;

use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\SubcategoryRepository;
use Illuminate\Http\Request;

/**
 * Class CompanySuggestService
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanySuggestService
{

    /**
     * @var CompanyRepository
     */
    private $repository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var SubcategoryRepository
     */
    private $subcategoryRepository;

    /**
     * CompanySuggestService constructor.
     * @param CompanyRepository $repository
     * @param CategoryRepository $categoryRepository
     * @param SubcategoryRepository $subcategoryRepository
     */
    public function __construct(CompanyRepository $repository,
                                CategoryRepository $categoryRepository,
                                SubcategoryRepository $subcategoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->subcategoryRepository = $subcategoryRepository;
    }

    /**
     * Search Suggest Bondary
     * @param Request $request
     * @return mixed
     */
    public function search(Request $request)
    {

        $query = [
            'search' => tools_sanitize_search($request->get('query')),
            'state_id' => intval( $request->get('state') ),
            'city_id' => intval( $request->get('city') ),
            'page' => intval( $request->get('page') )
        ];

        $query['search'] = tools_sanitize_search($query['search']);

        $categories = $this->searchCategories($query);

        if ($categories !== false) {
            return $categories;
        }

        $subcategories = $this->searchSubCategories($query);

        if ($subcategories !== false) {
            return $subcategories;
        }

        if (strlen($query['search'])>4) {

            $companies = $this->searchCompanies($query);
            if ($companies !== false) {
                return $companies;
            }

        }

        return (json_encode(array('suggestions' => [])));

    }

    /**
     * Search Suggest in Categories
     * @param $query
     * @return bool|string
     */
    public function searchCompanies($query)
    {

        $suggestions = array();
        $companies = $this->repository->searchCompaniesSuggest($query);

        if ($companies === false) {
            return false;
        }

        $companies_array = [];
        foreach($companies as $company)
        {
            array_push( $companies_array, $company->name_fantasy);
        }

        foreach($companies_array as $company)
        {
            $suggestions[] = array(
                'value' => $company,
                'name' => $company
            );
        }
        return (json_encode(array('suggestions' => $suggestions)));

    }

    /**
     * Search Suggest in Categories
     * @param $query
     * @return bool|string
     */
    private function searchCategories($query)
    {
        $categories = $this->categoryRepository->searchLikeSuggest($query);

        $suggestions = array();
        if ($categories === false) {
            return false;
        }

        $categories_array = [];
        foreach($categories as $category)
        {
            array_push( $categories_array, $category->name);
        }

        foreach($categories_array as $category)
        {
            $suggestions[] = array(
                'value' => $category,
                'name' => $category
            );
        }
        return (json_encode(array('suggestions' => $suggestions)));

    }

    /**
     * Search Suggest in SubCategories
     * @param $query
     * @return bool|string
     */
    private function searchSubCategories($query)
    {
        $subcategories = $this->subcategoryRepository->searchLikeSuggest($query);

        $suggestions = array();
        if ($subcategories === false) {
            return false;
        }

        $subcategories_array = [];
        foreach($subcategories as $subcategory)
        {
            array_push( $subcategories_array, $subcategory->name);
        }

        foreach($subcategories_array as $subcategory)
        {
            $suggestions[] = array(
                'value' => $subcategory,
                'name' => $subcategory
            );
        }
        return (json_encode(array('suggestions' => $suggestions)));

    }

}
