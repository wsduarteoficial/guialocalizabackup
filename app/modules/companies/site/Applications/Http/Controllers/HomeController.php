<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Domains\Models\State\StateRepository;
use SEOMeta;
use OpenGraph;
use URL;

/**
 * Class HomeController
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Controllers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class HomeController extends BaseController
{


    /**
     * @var StateRepository
     */
    private $stateRepository;

    /**
     * CompanySearchController constructor.
     * @param StateRepository $stateRepository
     */
    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $title = 'Guia Localiza - Telefones e Classificados!';
        $description = 'Guia Localiza é uma Lista Telefônica Online e de Classificados Gratuitos para Sua Região.';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical( URL::current() );

        OpenGraph::setTitle( $title );
        OpenGraph::setDescription( $description );
        OpenGraph::addImage(asset('/storage/uploads/logos-app/logo-shared.png'));


        $data = [];
        $data['states'] = $this->stateRepository->stateActive();
        return $this->view('companies.modules.home.index', $data);
    }

}
