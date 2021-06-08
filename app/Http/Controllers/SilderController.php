<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\SilderModel;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use App\Traits;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\Log;

class SilderController extends Controller
{

    use DeleteModelTrait;

    public  function  __construct(SilderModel $silderModel)
    {
        $this->slider =$silderModel;

    }


    public  function  index(){

        $sliders = $this->slider->paginate(5);

        return view('admin.slider.index' , compact('sliders'));
    }

    public  function  create(){

        return view('admin.slider.add');
    }

    public  function  store(SliderAddRequest $request){

        try {
            $dataInsert = [
                'name' => $request->name,
                'descripiton' =>$request->descripiton,
            ];

            $traitUpload = new Traits\StorageImageTrait();

            $dataImageSlider = $traitUpload->storageTraitUpload($request,'image_path', 'slider');

            if (!empty($dataImageSlider)){

                $dataInsert['image_path'] = $dataImageSlider['file_path'];
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
            }
            $this->slider->create($dataInsert);
            return redirect('admin/slider');

        }catch (\Exception $e){
            Log::error('Lỗi' . $e->getMessage(). 'Line'. $e->getLine());

        }

    }
    public  function edit($id){
        $slider =  $this->slider->find($id);




        return view('admin.slider.edit' ,compact('slider'));
    }


    public  function  update($id, Request $request){

        try {
            $dataUpdate = [
                'name' => $request->name,
                'descripiton' =>$request->descripiton,
            ];

            $traitUpload = new Traits\StorageImageTrait();

            $dataImageSlider = $traitUpload->storageTraitUpload($request,'image_path', 'slider');

            if (!empty($dataImageSlider)){

                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect('admin/slider');

        }catch (\Exception $e){
            Log::error('Lỗi' . $e->getMessage(). 'Line'. $e->getLine());

        }

    }

    public  function  delete($id){

        return  $this->deleteModelTrait($id,$this->slider);
    }

}
