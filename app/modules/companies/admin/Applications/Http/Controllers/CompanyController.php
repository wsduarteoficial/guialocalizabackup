<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company\CompanyEditService;
use GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company\CompanyRegisterService;
use GuiaLocaliza\Companies\Admin\Applications\Http\Services\CompanySearchService;
use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\StateRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContractRepository;
use Illuminate\Http\Request;

/**
 * Class CompanyController
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanyController extends BaseController
{

    /**
     * @var CompanySearchService
     */
    private $searchService;
    /**
     * @var CompanyRepository
     */
    private $companyRepository;
    /**
     * @var StateRepository
     */
    private $stateRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var CompanyRegisterService
     */
    private $registerService;
    /**
     * @var CompanyEditService
     */
    private $editService;
    /**
     * @var PlanContractRepository
     */
    private $planContractRepository;

    /**
     * CompanyController constructor.
     * @param CompanyRepository $companyRepository
     * @param StateRepository $stateRepository
     * @param CompanySearchService $searchService
     * @param CategoryRepository $categoryRepository
     * @param CompanyRegisterService $registerService
     * @param CompanyEditService $editService
     * @param PlanContractRepository $planContractRepository
     */
    public function __construct(CompanyRepository $companyRepository,
                                StateRepository $stateRepository,
                                CompanySearchService $searchService,
                                CategoryRepository $categoryRepository,
                                CompanyRegisterService $registerService,
                                CompanyEditService $editService,
                                PlanContractRepository $planContractRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->stateRepository = $stateRepository;
        $this->searchService = $searchService;
        $this->categoryRepository = $categoryRepository;
        $this->registerService = $registerService;
        $this->editService = $editService;
        $this->planContractRepository = $planContractRepository;
        
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $data = [];
        $categories= $this->categoryRepository->all();
        $collection = collect($categories);
        $sorted = $collection->sortBy('name');
        $data['categories'] = $sorted->values()->all();
        $data['states'] = $this->stateRepository->all();
        return $this->view('company.create', $data);

    }

    /**
     * Get Post Add New Register
     * @param Request $request
     */
    public function createPost(Request $request)
    {
        return $this->registerService->addNewRegister($request);
    }

    /**
     * Edit data company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {

        $data = [];
        $categories= $this->categoryRepository->all();
        $collection = collect($categories);
        $sorted = $collection->sortBy('name');
        $data['categories'] = $sorted->values()->all();
        $data['states'] = $this->stateRepository->all();
        $data['company'] = $this->companyRepository->findCompanyPerId($request->route('id'));
        $data['contract'] = $this->planContractRepository->findContractPerIdCompany($request->route('id'));
        return $this->view('company.edit', $data);

    }

    /**
     * Add New Register
     * @param Request $request
     */
    public function editPost(Request $request)
    {
        return $this->editService->editRegister($request);
    }

    /**
     * Search data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $data = [];
        $data['companies_route_title'] = 'via busca';
        $data['companies'] = $this->searchService->search($request);
        return $this->view('company.list')->with($data);
    }

    /**
     * List Company with status active
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listActive()
    {
        $data = [];
        $data['companies_route_title'] = 'ativas';
        $data['companies'] = $this->companyRepository->listAll(true);
        return $this->view('company.list')->with($data);
    }

    /**
     * List Company with status inactive
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listInactive()
    {
        $data = [];
        $data['companies_route_title'] = 'inativas';
        $data['companies'] = $this->companyRepository->listAll(false);
        return $this->view('company.list')->with($data);
    }

    /**
     * List Company Trashed
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listTrashed()
    {
        $data = [];
        $data['companies_route_title'] = 'Lixeira';
        $data['companies'] = $this->companyRepository->listTrashed();

        return $this->view('company.trashed')->with($data);
    }

}
