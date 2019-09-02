<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company;

use GuiaLocaliza\Companies\Admin\Domains\Models\Banner\BannerRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Client\ClientRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\GalleryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\PhoneRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContractRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\SubcategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\ZipcodeRepository;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Exception;
use DB;

/**
 * Class CompanyEditService
 * @package GuiaLocaliza\Companies\Admin\Applications\Http\Services\Company
 * @author Williams Duarte <https://github.com/williamsduarte>
 * Date: 09/11/17
 * File: CompanyEditService.php
 */
class CompanyEditService
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
     * @var BannerRepository
     */
    private $bannerRepository;
    /**
     * @var GalleryRepository
     */
    private $galleryRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var SubcategoryRepository
     */
    private $subcategoryRepository;
    /**
     * @var
     */
    private $positionBanner;

     /**
     * @var ZipcodeRepository
     */
    private $zipcodeRepository;

    /**
     * @var
     */
    private $company;

    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var
     */
    private $bannerId =null;

    /**
     * CompanyEditService constructor.
     * @param CompanyRepository $companyRepository
     * @param ClientRepository $clientRepository
     * @param PlanContractRepository $planContractRepository
     * @param PhoneRepository $phoneRepository
     * @param BannerRepository $bannerRepository
     * @param GalleryRepository $galleryRepository
     * @param CategoryRepository $categoryRepository
     * @param SubcategoryRepository $subcategoryRepository
     */
    public function __construct(CompanyRepository $companyRepository,
                                ClientRepository $clientRepository,
                                PlanContractRepository $planContractRepository,
                                PhoneRepository $phoneRepository,
                                BannerRepository $bannerRepository,
                                GalleryRepository $galleryRepository,
                                CategoryRepository $categoryRepository,
                                SubcategoryRepository $subcategoryRepository,
                                ZipcodeRepository $zipcodeRepository)
    {
        $this->companyRepository = $companyRepository;
        $this->planContractRepository = $planContractRepository;
        $this->phoneRepository = $phoneRepository;
        $this->bannerRepository = $bannerRepository;
        $this->galleryRepository = $galleryRepository;
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

            if ( ! empty($number) ) {

                if( ! $this->phoneRepository->checkExistsPhoneCompany($number, $this->company->id)) {

                    $phone = $this->phoneRepository->create([
                        'type' => $type,
                        'number' => tools_only_numbers( $number )
                    ]);

                    $this->company->phones()->attach($phone->id);

                }

            }

        }

    }

    /**
     * @param Request $request
     * @return bool
     */
    private function addBanner(Request $request)
    {

        if ( $this->positionBanner == 'banner_top_left') {
            $position = 'top-left'; //top_left
            $position_db = 'top_left';
            $resize_X = 250;
            $resize_Y = 250;
        } elseif ( $this->positionBanner == 'banner_right_side') {
            $resize_X = 300;
            $resize_Y = 250;
            $position = 'right-side';
            $position_db = 'right_side';
        } else {
            return false;
        }

        $exists = $this->bannerRepository->whereExists([
            'company_id' => $this->company->id,
            'position_search' => $position_db
        ]);

        if($exists === true) {

            $resImage = $this->bannerRepository->whereFirst([
                'company_id' => $this->company->id,
                'position_search' => $position_db
            ]);

            $pathImage = sprintf('public/uploads/companies/%d/banners/%s/%s',
                $this->company->id,
                $position,
                $resImage->image
            );

            Storage::delete( $pathImage );
            $this->bannerRepository->delete($resImage->id);

        }

        // Get filename with extension
        $filenameWithExt = $request->file( $this->positionBanner)->getClientOriginalName();

        // Get just the filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // Get extension
        $extension = $request->file( $this->positionBanner)->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = str_slug( $filename ) .'-'.time().'.'.$extension;

        // Uploads image
        $request->file( $this->positionBanner )->storeAs( sprintf('public/uploads/companies/%d/banners/%s', $this->company->id, $position ), $filenameToStore );

        $banner = $this->bannerRepository->create([
            'company_id' => $request->input('company_id'),
            'position_search' => $position_db,
            'image' => $filenameToStore,
            'ext' => $extension,
            'size' => $request->file( $this->positionBanner )->getClientSize()
        ]);

        if ( $this->positionBanner == 'banner_right_side') {
            $this->bannerId = $banner->id;
        }

        Image::make( storage_path( sprintf('app/public/uploads/companies/%d/banners/%s/%s',
            $this->company->id, $position, $filenameToStore ) ) )->resize($resize_X, $resize_Y,function ($constraint) {
            $constraint->aspectRatio();
        })->save();

    }

    /**
     * @param Request $request
     */
    private function addPhotosGallery(Request $request)
    {

        if (isset($request->photos) && count($request->photos) > 0) {

            foreach ($request->photos as $photo) {

                // Get filename with extension
                $filenameWithExt = $photo->getClientOriginalName();

                // Get just the filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                // Get extension
                $extension = $photo->getClientOriginalExtension();

                // Create new filename
                $filenameToStore = str_slug( $filename ) .'-'.time().'.'.$extension;

                $photo->storeAs(sprintf('public/uploads/companies/%d/photos', $this->company->id), $filenameToStore);

                Image::make( storage_path( sprintf('app/public/uploads/companies/%d/photos/%s',
                    $this->company->id, $filenameToStore ) ) )->resize(null, 768,function ($constraint) {
                    $constraint->aspectRatio();
                })->save();

                $this->galleryRepository->create([
                    'company_id' => $request->input('company_id'),
                    'image' => $filenameToStore,
                    'ext' => $extension,
                    'size' => $photo->getClientSize()
                ]);

            }

        }

    }

    /**
     * Update Categories
     * @param Request $request
     */
    private function updateCategories(Request $request)
    {

        if ($request->input('category_id') > 0) {

            DB::table('category_company')
                ->where('company_id', $this->company->id)
                ->delete();

            DB::table('subcategory_company')
                ->where('company_id', $this->company->id)
                ->delete();

            $category = $this->categoryRepository->find($request->input('category_id'));
            $category->companies()->attach( $this->company->id );

            if( $this->bannerId ){
                $category->banners()->attach( $this->bannerId );
            } else {

                $res = DB::table('banner_category')
                    ->whereExists(function($query)
                    {
                        $query->select(DB::raw(1))
                            ->from('banners')
                            ->whereRaw('banners.id = banner_category.banner_id')
                            ->where('banners.company_id', $this->company->id);
                    })->first();

                if (isset($res->id) && $res->id > 0 ) {

                    DB::table('banner_category')
                        ->where('id', $res->id)
                        ->update(['category_id' => $request->input('category_id')]);

                }

            }

        } else {

            $res = DB::table('banners')
                ->select('id')
                ->where('company_id', $this->company->id)
                ->first();

            if (isset($res->id) && $res->id > 0 ) {

                DB::table('banner_category')
                    ->where('banner_id', $res->id)
                    ->delete();

            }

        }

        if ($request->input('subcategory_id') > 0) {

            $subcategory = $this->subcategoryRepository->find($request->input('subcategory_id'));
            $subcategory->companies()->attach( $this->company->id );

            if( $this->bannerId ){
                $subcategory->banners()->attach( $this->bannerId );
            } else {

                $resB = DB::table('banners')
                    ->select('id')
                    ->where('company_id', $this->company->id)
                    ->first();

                if( isset( $resB->id ) && $resB->id > 0 ) {
                    $subcategory->banners()->attach( $resB->id );
                }

                $res = DB::table('banner_subcategory')
                    ->whereExists(function($query)
                    {
                        $query->select(DB::raw(1))
                            ->from('banners')
                            ->whereRaw('banners.id = banner_subcategory.banner_id')
                            ->where('banners.company_id', $this->company->id);
                    })->first();

                if (isset($res->id) && $res->id > 0 ) {

                    DB::table('banner_subcategory')
                        ->where('id', $res->id)
                        ->update(['subcategory_id' => $request->input('subcategory_id')]);

                }

            }

        } else {

            $res = DB::table('banners')
                ->select('id')
                ->where('company_id', $this->company->id)
                ->first();

            if (isset($res->id) && $res->id > 0 ) {

                DB::table('banner_subcategory')
                ->where('banner_id', $res->id)
                ->delete();

            }


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
     * Edit Register
     * @param Request $request
     */
    public function editRegister(Request $request)
    {

        DB::beginTransaction();

        try {

            $this->company = $this->companyRepository->find($request->input('company_id'));

            $this->companyRepository
                ->update(
                    $request->all(),
                    $request->input('company_id')
            );

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

                if($this->planContractRepository->whereExists(['company_id' => $request->input('company_id') ])) {

                    $this->planContractRepository->updateContract([
                            'client_id' => $client->id,
                            'plan_id' => $request->input('plan_id'),
                            'note' => $request->input('note'),
                            'start_at' => $request->input('start_at'),
                            'expired_at' => $request->input('expired_at')
                        ],
                        $request->input('company_id')
                    );

                } else {

                    $this->planContractRepository->create([
                        'client_id' => $client->id,
                        'company_id' => $request->input('company_id'),
                        'plan_id' => $request->input('plan_id'),
                        'note' => $request->input('note'),
                        'start_at' => $request->input('start_at'),
                        'expired_at' => $request->input('expired_at')
                    ]);

                }

                if ($request->file('banner_top_left')) {

                    $this->positionBanner = 'banner_top_left';
                    $this->addBanner($request);

                }

                if ($request->file('banner_right_side')) {

                    $this->positionBanner = 'banner_right_side';
                    $this->addBanner($request);

                }

                $this->addPhotosGallery($request);

            }

            $this->updateCategories($request);


            $zipcode = $this->addZipcode($request);

            $this->companyRepository->update([
                'zipcode_id' => isset( $zipcode->id ) ? $zipcode->id : null,
            ], $request->input('company_id'));

            $tag = sprintf('seo-company-id-%d', $request->input('company_id'));
            Cache::forget($tag);

            DB::commit();

            return redirect()
                ->route('admin.companies.edit',['id' => $request->input('company_id') ])
                ->with('success_edit', true);


        } catch (Exception $e) {

            DB::rollBack();

            if(isset($e->errorInfo['0']) && $e->errorInfo['0'] =="23000") {

                if(!strpos( $e->errorInfo['0'], 'clients_email_primary_unique')) {

                    return redirect()->route('admin.companies.edit',['id' => $request->input('company_id') ])
                            ->with('error_edit_duplicate', 'Endereço de email de notificações já está em uso.');
                }

            }

            return redirect()
                ->route('admin.companies.edit',['id' => $request->input('company_id') ])
                ->with('error_edit', true);


        }

    }

}
