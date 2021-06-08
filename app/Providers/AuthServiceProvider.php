<?php

namespace App\Providers;

use App\Models\CategoryModel;
use App\Models\MenuModel;
use App\Models\PermissionModel;
use App\Models\ProductModel;
use App\Models\RoleModel;
use App\Models\SettingsModel;
use App\Models\SilderModel;
use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\MenuPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\SliderPolicy;
use App\Policies\UserPolicy;
use App\Services\PermissionGateAndPolicyAcces;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

        CategoryModel::class => CategoryPolicy::class,
        ProductModel::class=>ProductPolicy::class,
        MenuModel::class =>MenuPolicy::class,
        SilderModel::class=>SliderPolicy::class,
        SettingsModel::class=>SettingPolicy::class,
        User::class =>UserPolicy::class,
        RoleModel::class=>RolePolicy::class,
        PermissionModel::class=>PermissionPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $permissionGatePolicy  = new PermissionGateAndPolicyAcces(); 
        // khơi tao ở bên Thư mục services để dễ nhìn code hơn
        $permissionGatePolicy->setGateAndPolicyAccess();

    

      
       
    }

    
  


}
