<?php

namespace App\Services;

use App\Policies\CategoryPolicy;
use App\Policies\MenuPolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\SettingPolicy;
use App\Policies\SliderPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAcces {

    public function setGateAndPolicyAccess(){

        $this->defineCategory();
        $this->defineMenu();
        $this->defineProduct();
        $this->defineSlider();
        $this->defineSetting();
        $this->defineUser();
        $this->defineRole();
     


    }


    public function defineCategory(){
        Gate::define('/categories', [CategoryPolicy::class , 'view']);
        Gate::define('/categories/add', [CategoryPolicy::class , 'create']);
        Gate::define('/categories/edit', [CategoryPolicy::class , 'update']);
        Gate::define('/categories/delete', [CategoryPolicy::class , 'delete']);

    }

    public function defineProduct(){
        Gate::define('/products', [ProductPolicy::class , 'view']);
        Gate::define('/products/add', [ProductPolicy::class , 'create']);
        Gate::define('/products/edit', [ProductPolicy::class , 'update']);
        Gate::define('/products/delete', [ProductPolicy::class , 'delete']);


    }

    public function defineMenu(){
        Gate::define('/menus', [MenuPolicy::class , 'view']);
        Gate::define('/menus/add', [MenuPolicy::class , 'create']);
        Gate::define('/menus/edit', [MenuPolicy::class , 'update']);
        Gate::define('/menus/delete', [MenuPolicy::class , 'delete']);
    }

    public function defineSlider(){
        Gate::define('/slider', [SliderPolicy::class , 'view']);
        Gate::define('/slider/add', [SliderPolicy::class , 'create']);
        Gate::define('/slider/edit', [SliderPolicy::class , 'update']);
        Gate::define('/slider/delete', [SliderPolicy::class , 'delete']);
    }


    public function defineSetting(){
        Gate::define('/settings', [SettingPolicy::class , 'view']);
        Gate::define('/settings/add', [SettingPolicy::class , 'create']);
        Gate::define('/settings/edit', [SettingPolicy::class , 'update']);
        Gate::define('/settings/delete', [SettingPolicy::class , 'delete']);
    }



    public function defineUser(){
        Gate::define('/users', [UserPolicy::class , 'view']);
        Gate::define('/users/add', [UserPolicy::class , 'create']);
        Gate::define('/users/edit', [UserPolicy::class , 'update']);
        Gate::define('/users/delete', [UserPolicy::class , 'delete']);
    }
    public function defineRole(){
        Gate::define('/roles', [RolePolicy::class , 'view']);
        Gate::define('/roles/add', [RolePolicy::class , 'create']);
        Gate::define('/roles/edit', [RolePolicy::class , 'update']);
        Gate::define('/roles/delete', [RolePolicy::class , 'delete']);
    }

}
