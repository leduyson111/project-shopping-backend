<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    use DeleteModelTrait;
    public function __construct(MenuRecusive $menuRecusive , MenuModel $menuModel)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menuModel;

    }

    public function index(){

        $menus = $this->menu->paginate(5);
        return view('admin.menus.index' ,compact('menus'));

    }
    
    public function create(){

        $optionSelect  =   $this->menuRecusive->menuRecusiveAdd();
       
        return view('admin.menus.add', compact('optionSelect'));

    }
    
    public function store(Request $request){

        $this->menu->create([
            'name'=> $request->name,
            'parent_id' =>$request->parent_id,
            'slug' => Str::slug($request->name),
            
        ]);
        return redirect('/admin/menus');

    }

 

    public function edit($id, Request $request){
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect  =   $this->menuRecusive->menuRecusiveEdit($menuFollowIdEdit->parent_id);

        return view('admin.menus.edit',compact('optionSelect' ,'menuFollowIdEdit'));
        
    }


    public function update($id,  Request $request ){
        $this->menu->find($id)->update([

            'name'=> $request->name,
            'parent_id'=> $request->parent_id,
            'slug' =>Str::slug($request->name),
        ]);
        return redirect('/admin/menus');

    }

    public function delete($id){
        
      $this->deleteModelTrait($id, $this->menu);
     

    }
}
