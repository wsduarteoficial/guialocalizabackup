<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Services;

use GuiaLocaliza\Companies\Site\Domains\Models\Banner\BannerRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\BannerReport\BannerReportRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\SubcategoryRepository;
use Illuminate\Http\Request;

/**
 * Class CompanyAdsRelatedService
 * @package GuiaLocaliza\Companies\Site\Applications\Http\Services
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class CompanyAdsRelatedService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var SubcategoryRepository
     */
    private $subcategoryRepository;
    /**
     * @var BannerRepository
     */
    private $bannerRepository;
    /**
     * @var BannerReportRepository
     */
    private $reportRepository;


    /**
     * CompanyAdsRelatedService constructor.
     * @param CategoryRepository $categoryRepository
     * @param SubcategoryRepository $subcategoryRepository
     * @param BannerRepository $bannerRepository
     * @param BannerReportRepository $reportRepository
     */
    public function __construct(CategoryRepository $categoryRepository,
                                SubcategoryRepository $subcategoryRepository,
                                BannerRepository $bannerRepository,
                                BannerReportRepository $reportRepository)
    {

        $this->categoryRepository = $categoryRepository;
        $this->subcategoryRepository = $subcategoryRepository;
        $this->bannerRepository = $bannerRepository;
        $this->reportRepository = $reportRepository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function makeAdsRelated(Request $request)
    {

        $data = [
            'companies_sponsors' => $request->get('companies_sponsors'),
            'categories_ids' => $request->get('categories_ids'),
            'subcategories_ids' => $request->get('subcategories_ids'),
            'tag_search' => $request->get('tag_search'),
            'state_id' => $request->get('state_search'),
            'city_id' => $request->get('city_search'),
            'total' => $request->get('total'),
        ];

        $total = $request->get('total_line');
        if($total<=3) {
            $data['total_per_page'] = 1;
        } elseif($total <=5){
            $data['total_per_page'] = 2;
        } else{
            $data['total_per_page'] = 3;
        }

        if (!is_null($data['subcategories_ids'])) {

            $result = $this->bannerRepository->filterBannersPerSubcategory($data);
            if ($result !== false) {
                $this->report($result, $data);
                return $result;
            }

            $result = $this->bannerRepository->filterBannersPerSubcategory($data);
            if ($result !== false) {
                $this->report($result, $data);
                return $result;
            }

        }

        if(is_null($data['categories_ids'])){
            return false;
        }

        $result = $this->bannerRepository->filterBannersPerCategory($data);
        if ($result !== false) {
            $this->report($result, $data);
            return $result;
        }

        return false;
    }

    private function report($result, $data)
    {

        foreach ($result as $item) {

            $this->reportRepository->create([
                'banner_id' => $item->id,
                'company_id' => $item->company_id,
                'state_id' => $data['state_id'],
                'city_id' => $data['city_id'],
                'action' => 'view',
                'url_referer' => request()->headers->get('referer'),
                'tags' => $data['tag_search'],
                'ip' => request()->ip(),
                'agent' => request()->headers->get('User-Agent'),

            ]);
        }
    }
}

