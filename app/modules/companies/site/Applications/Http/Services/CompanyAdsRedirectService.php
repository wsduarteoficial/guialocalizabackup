<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Services;

use GuiaLocaliza\Companies\Site\Domains\Models\BannerReport\BannerReport;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use Illuminate\Http\Request;

/**
 * Class CompanyAdsRedirectService
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanyAdsRedirectService
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;
    /**
     * @var BannerReport
     */
    private $bannerReport;

    /**
     * CompanyAdsRedirectService constructor.
     * @param CompanyRepository $companyRepository
     * @param BannerReport $bannerReport
     */
    public function __construct(CompanyRepository $companyRepository,
                                BannerReport $bannerReport)
    {

        $this->companyRepository = $companyRepository;
        $this->bannerReport = $bannerReport;
    }

    /**
     * Redirect User after click
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectAfterClick(Request $request)
    {

        $data  = $this->companyRepository->getDataPerUrlAds($request->get('company'));

        $slug = tools_slug_title_companies(
            $data->state->abbr,
            $data->city->id,
            $data->city->name,
            $data->district->name,
            $data->name_fantasy,
            $data->id
        );

        $this->report($request);
        return redirect($slug);
    }

    /**
     * Report data Ads
     * @param $request
     */
    private function report($request)
    {

        $get_string = $request->get('referer');
        $url = parse_url($get_string);

        if(isset($url['query'])) {
            parse_str($url['query'], $get_array);
        }

        $this->bannerReport->create([
            'banner_id' => $request->get('banner'),
            'company_id' => $request->get('company'),
            'state_id' => isset($get_array['state']) ? $get_array['state'] : 0,
            'city_id' => isset($get_array['city']) ? $get_array['city'] : 0,
            'action' => 'click',
            'url_referer' => request()->headers->get('referer'),
            'tags' => isset($get_array['q']) ? $get_array['q'] : null,
            'ip' => request()->ip(),
            'agent' => request()->headers->get('User-Agent'),

        ]);
    }
}

