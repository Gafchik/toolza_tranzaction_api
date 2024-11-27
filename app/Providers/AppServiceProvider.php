<?php

namespace App\Providers;

use App\Http\Classes\LogicalModels\UserInfo\{
    UserInfoInterface,
    UserInfo,
};
use App\Http\Classes\Core\BaseResponse\{
    BaseResponse,
    BaseResponseInterface,
};

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(BaseResponseInterface::class, BaseResponse::class);
        $this->app->singleton('base_response_facade', BaseResponseInterface::class);

        $this->app->singleton(UserInfoInterface::class, UserInfo::class);
        $this->app->singleton('user_info_facade', UserInfoInterface::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
