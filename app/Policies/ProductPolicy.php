<?php

namespace App\Policies;

use App\Models\ProductModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductModel  $productModel
     * @return mixed
     */
    public function view(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.product_list'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.product_add'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductModel  $productModel
     * @return mixed
     */
    public function update(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.product_edit'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductModel  $productModel
     * @return mixed
     */
    public function delete(User $user)
    {
        return  $user->checkPermissionAccess(config('permissions.access.product_delete'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductModel  $productModel
     * @return mixed
     */
    public function restore(User $user, ProductModel $productModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductModel  $productModel
     * @return mixed
     */
    public function forceDelete(User $user, ProductModel $productModel)
    {
        //
    }
}
