<?php

namespace GuiaLocaliza\Companies\Site\Applications\Http\Controllers;

use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use Sitemap;

class SitemapController extends BaseController
{
    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * SitemapController constructor.
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {

        $this->companyRepository = $companyRepository;
    }

    public function pages()
    {


        $companies = $this->companyRepository->getCompaniesAll();

        foreach ($companies as $company) {

            $district = !empty($company->district->name) ? $company->district->name : '';

            $slug = tools_slug_title_companies(
                $company->state->abbr,
                $company->city->id,
                $company->city->name,
                $district,
                $company->name_fantasy,
                $company->id
            );

            Sitemap::addTag(asset( $slug ), $company->updated_at, 'daily', '0.8');
        }

        return Sitemap::render();

    }


}
