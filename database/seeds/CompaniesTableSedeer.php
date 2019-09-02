<?php

use GuiaLocaliza\Companies\Admin\Domains\Models\Banner\Banner;
use GuiaLocaliza\Companies\Admin\Domains\Models\Category\Category;
use GuiaLocaliza\Companies\Admin\Domains\Models\Client\Client;
use GuiaLocaliza\Companies\Admin\Domains\Models\Click\Click;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\Company;
use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\Gallery;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\Phone;
use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\Subcategory;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContract;
use Illuminate\Database\Seeder;

class CompaniesTableSedeer extends Seeder
{
    /**
     * @var Company
     */
    private $company;
    /**
     * @var Category
     */
    private $category;
    /**
     * @var Subcategory
     */
    private $subcategory;

    /**
     * CompaniesTableSedeer constructor.
     * @param Company $company
     * @param Category $category
     * @param Subcategory $subcategory
     */
    public function __construct(Company $company,
                                Category $category,
                                Subcategory $subcategory)
    {
        $this->company = $company;
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        //Total por categoria iguais
        for($i=0; $i <= 100 ; $i++ ) {
            $this->factoryCompanies();
        }

    }

    public function factoryCompanies()
    {

        $category = $this->category->inRandomOrder()->first();
        $subcategory = $this->subcategory->where('category_id', '=', $category->id)
        ->get()->first();


        $companies = factory(Company::class,2)->create();

        foreach ($companies as $company) {

            $qtdphone = rand(1,3);
            if ($company->plan_id > 1) {
                $qtdphone = rand(1,6);
            }

            $dbcompany = $this->company->find($company->id);

  
            if (!empty($category->id)) {
                $category->companies()->attach($company->id);
            }

            if (!empty($subcategory->id)) {
                $subcategory->companies()->attach($company->id);
            }

            $phones = factory(Phone::class,$qtdphone)->create();

            foreach ($phones as $phone) {
                $dbcompany->phones()->attach($phone->id);

                factory(Click::class, rand(0,2))->create([
                    'company_id' => $company->id,
                    'phone_id' => $phone->id
                ]);

            }

            if ($company->plan_id > 1) {

                factory(Banner::class)->create([
                    'company_id' => $company->id,
                    'position_search' => 'top_left'
                ]);

                $banner = factory(Banner::class)->create([
                    'company_id' => $company->id,
                    'position_search' => 'right_side'
                ]);

                if (!empty($category->id)) {
                    $category->banners()->attach($banner->id);
                }

                if (!empty($subcategory->id)) {
                    $subcategory->banners()->attach($banner->id);
                }

                factory(Gallery::class, rand(0, 2))->create([
                    'company_id' => $company->id
                ]);

                factory(PlanContract::class)->create([
                    'client_id' => factory(Client::class)->create()->id,
                    'company_id' => $company->id,
                    'plan_id' => $company->plan_id
                ]);

            }

        }

    }

}
