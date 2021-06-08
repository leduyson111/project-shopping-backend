<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddRequest;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\CategoryModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use App\Models\ProductTagModel;
use App\Models\TagModel;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AdminProductController extends Controller
{

    use DeleteModelTrait;

    private $category;

    public function __construct(CategoryModel $categoryModel, ProductModel $productModel , ProductImageModel $productImageModel, TagModel $tagModel,ProductTagModel $productTagModel)
    {
        $this->category = $categoryModel;
        $this->productImage = $productImageModel;
        $this->product = $productModel;
        $this->tag = $tagModel;
        $this->productTag = $productTagModel;

    }

    public function index(){

        $products = $this->product->simplePaginate(3);

        return view('admin.product.index',compact('products'));
    }

    public function create(){

        $htmlOption= $this->getCategory($parent_id = '');
        return view('admin.product.add', compact('htmlOption'));

    }

    public function getCategory($parent_id){

        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption =    $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }

    public function store(ProductAddRequest $request){

        try{

            DB::beginTransaction();

            $dataProductCreate =[
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'user_id'=> auth()->id(),
                'category_id'=>$request->category_id,
                'view_count'=> '0',
            ];
            $storageGet = new  StorageImageTrait();
            $dataUploadFeatureImage =$storageGet->storageTraitUpload($request, 'feature_image_path','product' );

            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];

            }
            $product =  $this->product->create($dataProductCreate);

            //thêm ảnh sản phẩm chi tiết sản phẩm
            if($request->hasFile('image_path')){
                foreach($request->image_path as $filItem){
                    $dataProductDetail = $storageGet->storageTraitUploadMutiple($filItem,'product');
                    $product->images()->create([
                        'image_name'=>$dataProductDetail['file_name'],
                        'image_path' => $dataProductDetail['file_path'],
                    ]);
                }
            }
            // thêm các tags cho sản phẩm
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){

                    $tagInstance =  $this->tag->firstOrCreate(['name' =>$tagItem ]);
                    $tagId[]  = $tagInstance->id;
                }
                $product->tags()->attach($tagId);
            }

           
            DB::commit();

            return redirect('admin/product')->with('status', 'Thêm thành công');

        }catch(Exception  $e ){
            DB::rollBack();
            Log::error("message" . $e->getMessage(). 'Line: '.$e->getLine());
            // return redirect('admin/product/create');
        }
    }


    public function edit($id){

        $product = $this->product->find($id);
        $htmlOption= $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption','product'));
    }

    public function update(Request $request, $id){
        try{

            DB::beginTransaction();
            $dataProductUpdate =[
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'user_id'=> auth()->id(),
                'category_id'=>$request->category_id,
            ];
            $storageGet = new  StorageImageTrait();
            $dataUploadFeatureImage =$storageGet->storageTraitUpload($request, 'feature_image_path','product' );

            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];

            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            //thêm ảnh sản phẩm chi tiết sản phẩm
            if($request->hasFile('image_path')){
                $this->productImage->where('product_id',$id)->delete();

                foreach($request->image_path as $filItem){
                    $dataProductDetail = $storageGet->storageTraitUploadMutiple($filItem,'product');
                    $product->images()->create([
                        'image_name'=>$dataProductDetail['file_name'],
                        'image_path' => $dataProductDetail['file_path'],
                    ]);
                }
            }

            // thêm các tags cho sản phẩm
            $tagId = [];

            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    $tagInstance =  $this->tag->firstOrCreate(['name' =>$tagItem ]);
                    $tagId[]  = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagId);
         
            DB::commit();
            return redirect('admin/product');

        }catch(Exception  $e ){
            DB::rollBack();
            Log::error("message" . $e->getMessage(). 'Line: '.$e->getLine());
        }


    }

    public function delete($id){
        return  $this->deleteModelTrait($id,$this->product);

    }




}
