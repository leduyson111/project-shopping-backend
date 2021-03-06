<?php

namespace App\Http\Controllers;

use App\Models\PermissionModel;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    

    public function createPermissions(){

        return view('admin.permission.add');

    }


    public function store(Request $request){

        $permission  = PermissionModel::create([
            'name' =>$request->module_parent,
            'display_name'=>$request->module_parent,
            'parent_id' => 0,
            'key_code' => '',
        ]);

        foreach($request->module_childrent as $value){
            PermissionModel::create([
                'name' =>$value,
                'display_name'=>$value,
                'parent_id' => $permission->id,
                'key_code' => $request->module_parent .'_'.$value
            ]);

        }

        return redirect('admin/permissions/create');



    }
}
