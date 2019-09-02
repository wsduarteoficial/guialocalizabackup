<?php

namespace GuiaLocaliza\Companies\Admin\Applications\Providers;

use GuiaLocaliza\Companies\Admin\Domains\Models\ApiCepAberto\ApiCepAbertoRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Audit\AuditRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Banner\BannerRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\BannerReport\BannerReportRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Click\ClickRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Client\ClientRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Code\CodeRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Comment\CommentRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\ConfigurationPayment\ConfigurationPaymentRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Contact\ContactRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Coupon\CouponRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\District\DistrictRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Gallery\GalleryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Log\LogActivityRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Log\LogSearchRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Modification\ModificationRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Phone\PhoneRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Place\PlaceRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Plan\PlanRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\PlanContract\PlanContractRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Rating\RatingRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\SituationPayment\SituationPaymentRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\SolicitationRegister\SolicitationRegisterRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\State\StateRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Subcategory\SubcategoryRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Tag\TagRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\User\UserRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Zipcode\ZipcodeRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Setting\SettingRepository;
use GuiaLocaliza\Companies\Admin\Domains\Models\Page\PageRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\ApiCepAberto\EloquentApiCepAbertoRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Audit\EloquentAuditRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Banner\EloquentBannerRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\BannerReport\EloquentBannerReportRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Category\EloquentCategoryRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\City\EloquentCityRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Click\EloquentClickRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Client\EloquentClientRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Code\EloquentCodeRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Comment\EloquentCommentRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Company\EloquentCompanyRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\ConfigurationPayment\EloquentConfigurationPaymentRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Contact\EloquentContactRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Coupon\EloquentCouponRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\District\EloquentDistrictRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Gallery\EloquentGalleryRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Log\EloquentLogActivityRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Log\EloquentLogSearchRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Modification\EloquentModificationRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Phone\EloquentPhoneRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Place\EloquentPlaceRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Plan\EloquentPlanRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\PlanContract\EloquentPlanContractRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Rating\EloquentRatingRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\SituationPayment\EloquentSituationPaymentRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\SolicitationRegister\SolicitationRegisterRepositoryEloquent;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\State\EloquentStateRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Subcategory\EloquentSubcategoryRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Tag\EloquentTagRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Zipcode\EloquentZipcodeRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\User\EloquentUserRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Setting\EloquentSettingRepository;
use GuiaLocaliza\Companies\Admin\Infrastructures\Domains\Repositories\Page\EloquentPageRepository;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package GuiaLocaliza\Companies\Admin\Applications\Providers
 * @author Williams Duarte <https://github.com/williamsduarte>
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiCepAbertoRepository::class, EloquentApiCepAbertoRepository::class);
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(StateRepository::class, EloquentStateRepository::class);
        $this->app->bind(ClientRepository::class, EloquentClientRepository::class);
        $this->app->bind(CityRepository::class, EloquentCityRepository::class);
        $this->app->bind(CompanyRepository::class, EloquentCompanyRepository::class);
        $this->app->bind(PhoneRepository::class, EloquentPhoneRepository::class);
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->bind(SubcategoryRepository::class, EloquentSubcategoryRepository::class);
        $this->app->bind(TagRepository::class, EloquentTagRepository::class);
        $this->app->bind(BannerRepository::class, EloquentBannerRepository::class);
        $this->app->bind(BannerReportRepository::class, EloquentBannerReportRepository::class);
        $this->app->bind(AuditRepository::class, EloquentAuditRepository::class);
        $this->app->bind(ClickRepository::class, EloquentClickRepository::class);
        $this->app->bind(CommentRepository::class, EloquentCommentRepository::class);
        $this->app->bind(ZipcodeRepository::class, EloquentZipcodeRepository::class);
        $this->app->bind(SolicitationRegisterRepository::class, SolicitationRegisterRepositoryEloquent::class);
        $this->app->bind(SituationPaymentRepository::class, EloquentSituationPaymentRepository::class);
        $this->app->bind(RatingRepository::class, EloquentRatingRepository::class);
        $this->app->bind(PlanRepository::class, EloquentPlanRepository::class);
        $this->app->bind(PlanContractRepository::class, EloquentPlanContractRepository::class);
        $this->app->bind(PlaceRepository::class, EloquentPlaceRepository::class);
        $this->app->bind(ModificationRepository::class, EloquentModificationRepository::class);
        $this->app->bind(GalleryRepository::class, EloquentGalleryRepository::class);
        $this->app->bind(DistrictRepository::class, EloquentDistrictRepository::class);
        $this->app->bind(CouponRepository::class, EloquentCouponRepository::class);
        $this->app->bind(ContactRepository::class, EloquentContactRepository::class);
        $this->app->bind(ConfigurationPaymentRepository::class, EloquentConfigurationPaymentRepository::class);
        $this->app->bind(CodeRepository::class, EloquentCodeRepository::class);
        $this->app->bind(LogSearchRepository::class, EloquentLogSearchRepository::class);
        $this->app->bind(LogActivityRepository::class, EloquentLogActivityRepository::class);
        $this->app->bind(SettingRepository::class, EloquentSettingRepository::class);
        $this->app->bind(PageRepository::class, EloquentPageRepository::class);
        //:end-bindings:

    }

}
