<?php

namespace GuiaLocaliza\Companies\Site\Applications\Providers;

use GuiaLocaliza\Companies\Site\Domains\Models\Audit\AuditRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Banner\BannerRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\BannerReport\BannerReportRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Category\CategoryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\City\CityRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Click\ClickRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Code\CodeRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Comment\CommentRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Company\CompanyRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\ConfigurationPayment\ConfigurationPaymentRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Contact\ContactRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Coupon\CouponRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\District\DistrictRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Gallery\GalleryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Log\LogActivityRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Log\LogSearchRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Modification\ModificationRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Page\PageRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Phone\PhoneRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Place\PlaceRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Plan\PlanRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\PlanContract\PlanContractRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Rating\RatingRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\SituationPayment\SituationPaymentRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\SolicitationRegister\SolicitationRegisterRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\State\StateRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Subcategory\SubcategoryRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Tag\TagRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\User\UserRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Zipcode\ZipcodeRepository;
use GuiaLocaliza\Companies\Site\Domains\Models\Setting\SettingRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Audit\EloquentAuditRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Banner\EloquentBannerRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\BannerReport\EloquentBannerReportRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Category\EloquentCategoryRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\City\EloquentCityRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Click\EloquentClickRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Code\EloquentCodeRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Comment\EloquentCommentRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Company\EloquentCompanyRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\ConfigurationPayment\EloquentConfigurationPaymentRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Contact\EloquentContactRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Coupon\EloquentUserRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\District\EloquentDistrictRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Gallery\EloquentGalleryRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Log\EloquentLogActivityRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Log\EloquentLogSearchRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Modification\EloquentModificationRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Page\EloquentPageRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Phone\EloquentPhoneRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Place\EloquentPlaceRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Plan\EloquentPlanRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\PlanContract\EloquentPlanContractRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Rating\EloquentRatingRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\SituationPayment\EloquentSituationPaymentRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\SolicitationRegister\SolicitationRegisterRepositoryEloquent;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\State\EloquentStateRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Subcategory\EloquentSubcategoryRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Tag\EloquentTagRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Zipcode\EloquentZipcodeRepository;
use GuiaLocaliza\Companies\Site\Infrastructures\Domains\Repositories\Setting\EloquentSettingRepository;
use Illuminate\Support\ServiceProvider;


/**
 * Class RepositoryServiceProvider
 * @package GuiaLocaliza\Companies\Site\Applications\Providers
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
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(StateRepository::class, EloquentStateRepository::class);
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
        $this->app->bind(PageRepository::class, EloquentPageRepository::class);
        $this->app->bind(ModificationRepository::class, EloquentModificationRepository::class);
        $this->app->bind(GalleryRepository::class, EloquentGalleryRepository::class);
        $this->app->bind(DistrictRepository::class, EloquentDistrictRepository::class);
        $this->app->bind(CouponRepository::class, EloquentUserRepository::class);
        $this->app->bind(ContactRepository::class, EloquentContactRepository::class);
        $this->app->bind(ConfigurationPaymentRepository::class, EloquentConfigurationPaymentRepository::class);
        $this->app->bind(CodeRepository::class, EloquentCodeRepository::class);
        $this->app->bind(LogSearchRepository::class, EloquentLogSearchRepository::class);
        $this->app->bind(LogActivityRepository::class, EloquentLogActivityRepository::class);
        $this->app->bind(SettingRepository::class, EloquentSettingRepository::class);

        //:end-bindings:

    }
}
