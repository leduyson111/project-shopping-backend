<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    use DeleteModelTrait;
    
    private $category ;


    public function __construct(CategoryModel $categoryModel)
    {
        $this->category = $categoryModel;

    }


    public function index(){

        $categories =$this->category->latest()->paginate(10);
        return view('admin.category.index', compact('categories'));

    }

   
    public function create(){

        
        $htmlOption= $this->getCategory($parent_id = '');
        return view('admin.category.add', compact('htmlOption'));

    }

    public function store(Request $request){
        $this->category->create([
            'name'=>$request->name,
            'parent_id'=> $request->parent_id,
            'slug'=> Str::slug($request->name),
        ]);
        return redirect('/admin/categories');
    }


    public function getCategory($parent_id){

        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption =    $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }



    public function edit($id){

        
        $category= $this->category->find($id);
        $htmlOption= $this->getCategory($category->parent_id);

        return view('admin.category.edit', compact('category','htmlOption'));

    }

    public function update(Request $request,$id){

        $this->category->find($id)->update([
            'name'=>$request->name,
            'parent_id'=> $request->parent_id,
            'slug'=> Str::slug($request->name),
        ]);
        return redirect('/admin/categories');
    }

    public function delete($id){
        
        return  $this->deleteModelTrait($id,$this->category);

    }

  

}
