<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Services;

use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\SubcategoryRepository;
use Illuminate\Http\Request;
use Validator;

/**
 * Class CompanySeoCityCategoryService
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanySeoCityCategoryService
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
     * CompanySeoCityCategoryService constructor.
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
    public function list(Request $request)
    {

        $data = [
            'city_id' => intval($request->route('city_id')),
            'category_id' => intval($request->route('category_id')),
            'page' => intval($request->get('page'))
        ];

        $companies = $this->companyRepository->filterPerCategoriesCity($data);
        if ($companies !== false) {
            return $companies;
        }
        return [];

    }


}
