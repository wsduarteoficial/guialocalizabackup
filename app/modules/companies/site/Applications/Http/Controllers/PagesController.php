<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Domains\Models\Page\PageRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\State\StateRepository;
use Illuminate\Http\Request;
use SEOMeta;
use URL;

class PagesController extends BaseController
{

    /**
     * @var StateRepository
     */
    private $stateRepository;

    private $pageRepository;

    public function __construct(PageRepository $pageRepository,
                                StateRepository $stateRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->stateRepository = $stateRepository;
    }

    public function viewPage(Request $request)
    {

        $states = $this->stateRepository->stateActive();
        $page =  $this->pageRepository->whereFirst([
            'slug' => $request->route('slug'),
            'active' => true
        ]);

        SEOMeta::setTitle($page->title . ' - GuiaLocaliza.com.br');
        SEOMeta::setDescription( str_limit( $page->body, 320) );
        SEOMeta::setCanonical( URL::current() );

        return $this->view('companies.modules.page.index', ['page' => $page, 'states' => $states]);

    }

}
