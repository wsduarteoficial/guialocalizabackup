<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company;

use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Client\ClientRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\PhoneRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\ZipcodeRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContractRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\SubcategoryRepository;
use Illuminate\Http\Request;

/**
 * Class CompanyRegisterService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 09/11/17
 * File: CompanyRegisterService.php
 */
class CompanyRegisterService
{

    /**
     * @var CompanyRepository
     */
    private $companyRepository;

    /**
     * @var PlanContractRepository
     */
    private $planContractRepository;

    /**
     * @var PhoneRepository
     */
    private $phoneRepository;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var SubcategoryRepository
     */
    private $subcategoryRepository;

    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var
     */
    private $company;
    /**
     * @var ZipcodeRepository
     */
    private $zipcodeRepository;

    /**
     * CompanyRegisterService constructor.
     * @param CompanyRepository $companyRepository
     * @param ClientRepository $clientRepository
     * @param PlanContractRepository $planContractRepository
     * @param PhoneRepository $phoneRepository
     * @param CategoryRepository $categoryRepository
     * @param SubcategoryRepository $subcategoryRepository
     * @param ZipcodeRepository $zipcodeRepository
     */
    public function __construct(CompanyRepository $companyRepository,
                                ClientRepository $clientRepository,
                                PlanContractRepository $planContractRepository,
                                PhoneRepository $phoneRepository,
                                CategoryRepository $categoryRepository,
                                SubcategoryRepository $subcategoryRepository,
                                ZipcodeRepository $zipcodeRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->planContractRepository = $planContractRepository;
        $this->phoneRepository = $phoneRepository;
        $this->categoryRepository = $categoryRepository;
        $this->subcategoryRepository = $subcategoryRepository;
        $this->clientRepository = $clientRepository;
        $this->zipcodeRepository = $zipcodeRepository;

    }

    /**
     * Add Number Phones
     * @param $type
     * @param $numbers
     */
    private function addPhone($type, $numbers)
    {

        $collection = collect($numbers);
        $uniqueNumber = $collection->unique();

        foreach ($uniqueNumber->values()->all() as $number) {

            if (!empty($number)) {

                $phone = $this->phoneRepository->create([
                    'type' => $type,
                    'number' => tools_only_numbers( $number )
                ]);

                $this->company->phones()->attach($phone->id);

            }

        }

    }

    /**
     * Add Ids Categories via Attachs
     * @param Request $request
     */
    private function addCategories(Request $request)
    {

        if ($request->input('category_id') > 0) {

            $category = $this->categoryRepository->find($request->input('category_id'));
            $category->companies()->attach( $this->company->id );

        }

        if ($request->input('subcategory_id') > 0) {

            $subcategory = $this->subcategoryRepository->find($request->input('subcategory_id'));
            $subcategory->companies()->attach( $this->company->id );

        }

    }

    /**
     * Add place
     * @param Request $request
     * @return bool
     */
    private function addZipcode(Request $request)
    {
        if ( !empty( $request->input('zipcode_id') ) ) {

            $exists =  $this->zipcodeRepository->whereExists([
                'city_id' => $request->input('city_id'),
                'code' => $request->input('zipcode_id')
            ]);

            if ($exists === true) {
                return $this->zipcodeRepository->whereFirst([
                    'city_id' => $request->input('city_id'),
                    'code' => $request->input('zipcode_id')
                ]);
            }

            return $this->zipcodeRepository->create([
                'city_id' => $request->input('city_id'),
                'code' => $request->input('zipcode_id')
            ]);

        }

        return false;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addNewRegister(Request $request)
    {

        $this->company = $this->companyRepository->create($request->all());

        $this->addPhone('fixed', $request->input('phone_fixed'));
        $this->addPhone('cell', $request->input('phone_cell'));
        $this->addPhone('others', $request->input('phone_others'));

        if ($request->input('plan_id') > 1) {

            $cpf_cnpj = tools_only_numbers($request->input('cpf_cnpj'));

            if (!$this->clientRepository->existsCpfCnpj( $cpf_cnpj )) {

                $client = $this->clientRepository->create([
                    'cpf_cnpj' => $cpf_cnpj,
                    'company_name' => $request->input('company_name'),
                    'contracting_name' => $request->input('contracting_name'),
                    'phone' => $request->input('phone'),
                    'email_primary' => $request->input('email_primary'),
                    'email_secondary' => $request->input('email_secondary')
                ]);

            } else {
                $client = $this->clientRepository->filterPerCpfCnpj( $cpf_cnpj );
            }

            $this->planContractRepository->create([
                'client_id' => $client->id,
                'company_id' => $this->company->id,
                'plan_id' => $request->input('plan_id'),
                'note' => $request->input('note'),
                'start_at' => $request->input('start_at'),
                'expired_at' => $request->input('expired_at')
            ]);

        }

        $this->addCategories($request);

        $zipcode = $this->addZipcode($request);

        $this->companyRepository->update([
            'zipcode_id' => isset( $zipcode->id ) ? $zipcode->id : null,
        ], $this->company->id);


        //dd($request->input('type_redirect'));

        //only_save -> enviar para editar
        //save_add_new -> nova option

        //save_continue -> enviar para editar com imagens

        //dd($request->all());

        if($request->input('type_redirect') == 'save_add_new') {
            return redirect()
                ->route('admin.companies.create',['id' => $this->company->id ])
                ->with('success_register', true);
        }

        return redirect()
            ->route('admin.companies.edit',['id' => $this->company->id ])
            ->with('success_register', true);

    }

}
