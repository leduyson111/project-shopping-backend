<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Models\SettingsModel;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{

    use DeleteModelTrait;

    public function __construct(SettingsModel $settingsModel)
    {
        $this->setting = $settingsModel;
        
    }


    public  function  index(){

       $settings =  $this->setting->latest()->paginate(5);

        return view('admin.settings.index' ,compact('settings'));

    }


    public  function  create(){

        return view('admin.settings.add');
    }

    public  function store(AddSettingRequest $request){

        $this->setting->create([
            'config_key' =>$request->config_key,
            'config_value' =>$request->config_value,
            'type' =>$request->type,
        ]);
        return redirect('admin/settings');

    }
    public  function  edit( $id ){

        $setting  =   $this->setting->find($id);
        return view('admin.settings.edit' ,compact('setting'));
    }

    public function update( $id ,Request $request){

        $this->setting->find($id)->update([
            'config_key' =>$request->config_key,
            'config_value' =>$request->config_value,
        ]);
        return redirect('admin/settings');

    }

    public function delete($id){


      return  $this->deleteModelTrait($id,$this->setting);

    }


}
