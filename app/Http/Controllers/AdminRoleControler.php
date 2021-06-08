<?php

namespace App\Http\Controllers;

use App\Models\PermissionModel;
use App\Models\RoleModel;
use Illuminate\Http\Request;

class AdminRoleControler extends Controller
{


    public function __construct(RoleModel $roleModel, PermissionModel $permissionModel)
    {
        $this->role = $roleModel;
        $this->permission = $permissionModel;
    }

    public function index(){
        $roles =   $this->role->paginate(10);


        return view('admin.role.index', compact('roles'));

    }

    public function create(){


        $permissionsParent  = $this->permission->where('parent_id', 0)->get();
     

        return view('admin.role.add' ,compact('permissionsParent'));

    }


    public function store(Request $request){

        $role =    $this->role->create([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
        ]);

        $role->permissions()->attach($request->permission_id);

        return redirect('admin/roles');

    }

    public function edit($id){

        $permissionsParent  = $this->permission->where('parent_id', 0)->get();

        $role = $this->role->find($id);

        $permissionChecked = $role->permissions;

        return view('admin.role.edit' ,compact('permissionsParent' , 'role' , 'permissionChecked'));

    }

    public function update($id, Request $request){
        $role =   $this->role->find($id);
        $role->update([
            'name'=>$request->name,
            'display_name'=>$request->display_name,
        ]); 
        $role->permissions()->sync($request->permission_id);

        return redirect('admin/roles');
    }
    




}
