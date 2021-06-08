<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StorageImageTrait{
    public function storageTraitUpload($request , $fileName, $foderName){

        if($request->hasFile($fileName)){
            $file = $request->$fileName;
            $fileNameOrgin = $file->getClientOriginalName();
            $fileNameHash = Str::random('20') . '.'.$file->getClientOriginalName();
           
            $filePath = $request->file($fileName)->storeAs('public/'.'/'. $foderName.auth()->id(),$fileNameHash);
            $dataUploadTrait = [
                'file_name'=>$fileNameOrgin,
                'file_path'=>$url = Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        return null;
    }


    public function storageTraitUploadMutiple($file, $foderName){

        $fileNameOrgin = $file->getClientOriginalName();
        $fileNameHash = Str::random('20') . '.'.$file->getClientOriginalName();
        $filePath = $file->storeAs('public/'.'/'. $foderName.auth()->id(),$fileNameHash);

        $dataUploadTrait = [
            'file_name'=>$fileNameOrgin,
            'file_path'=>$url = Storage::url($filePath)
        ];
        return $dataUploadTrait;


    }


}