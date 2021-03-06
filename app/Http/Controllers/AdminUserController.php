<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    use DeleteModelTrait;


    public function __construct(User $user, RoleModel $roleModel)
    {
        $this->user = $user;

        $this->role = $roleModel;

        
    }
    
    public function index(){


        $users = $this->user->paginate(10);

        return view('admin.user.index', compact('users'));


    }
    
    public function create(){



        $roles = $this->role->all();

        return view('admin.user.add', compact('roles'));

    }

    public function store(Request $request){

        try{
            DB::beginTransaction();
            $user =  $this->user->create([
                'name' => $request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password)
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect('/admin/users');

        }catch(Exception $e){
            DB::rollBack();
            Log::error("message".$e->getMessage(). 'Line:' .$e->getLine());
        }

   


    }

    public function edit($id){
        $roles = $this->role->all();
        $user =   $this->user->find($id);
        $roleUser = $user->roles;  // roles này là phương thức bên định nghĩa chỗ models

      

        return view('admin.user.edit', compact('roles', 'user' , 'roleUser'));
    }

    public function update(Request $request, $id){

        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password)
            ]);
            $user = $this->user->find($id);

            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect('/admin/users');

        }catch(Exception $e){
            DB::rollBack();
            Log::error("message".$e->getMessage(). 'Line:' .$e->getLine());
        }



    }

    public function delete($id){
        return $this->deleteModelTrait($id,$this->user);

    }


}
