<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Applications\Http\Services\CompanySearchService;
use GuiaLocaliza\Companies\Site\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\State\StateRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SEOMeta;
use OpenGraph;
use URL;

/**
 * Class CompanySearchController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanySearchController extends BaseController
{
    /**
     * @var CompanySearchService
     */
    private $companySearchService;
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var StateRepository
     */
    private $stateRepository;

    /**
     * CompanySearchController constructor.
     * @param CompanySearchService $companySearchService
     * @param StateRepository $stateRepository
     * @internal param CityRepository $cityRepository
     */
    public function __construct(CompanySearchService $companySearchService,
                                StateRepository $stateRepository)
    {
        $this->companySearchService = $companySearchService;
        $this->stateRepository = $stateRepository;
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
        $companies = $this->companySearchService->search($request);
        $data['companies'] = $companies;
        $data['time'] = toots_calculate_start($start);

        $title = sprintf( 'Busca por %s', strtoupper( $request->get('q') ) );
        $description = sprintf( 'Busca por %s', strtoupper( $request->get('q') ) ) ;

        SEOMeta::setTitle( $title );
        SEOMeta::setDescription( sprintf( 'Busca por %s', strtoupper( $request->get('q') ) ) );
        SEOMeta::setCanonical( URL::current() );

        OpenGraph::setTitle( $title );
        OpenGraph::setDescription( $description );
        OpenGraph::addImage(asset('/storage/uploads/logos-app/logo-shared.png'));

        return $this->view('companies.modules.search.result', $data);

    }

}
