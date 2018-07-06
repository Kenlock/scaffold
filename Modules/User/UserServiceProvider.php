<?php namespace Modules\User;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\ServiceProvider;
use Modules\User\Models\Permission;
use Modules\User\Models\Role;
use Modules\User\Observers\PermissionObserver;
use Modules\User\Observers\RoleObserver;

class UserServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->registerListeners();
    }

    private function registerListeners()
    {
        \Event::listen(Login::class, function (Login $event) {
            $user = $event->user;
            $user->last_login_at = Carbon::now();
            $user->login_times++;
            $user->save();
        });

        \Event::listen(Logout::class, function (Logout $event) {
            $user = $event->user;
        });

        Permission::observe(PermissionObserver::class);
        Role::observe(RoleObserver::class);
    }
}