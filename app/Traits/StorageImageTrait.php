<?php 
namespace App\Traits;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage;

trait StorageImageTrait{
    //
    public function storageTraitUpload(Request $request,$fieldName,$folderName){

        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(20).'.'.$file->getClientOriginalExtension();
    
            $filepath = $request->file($fieldName)->storeAs('public/'.$folderName.'/'.auth()->id(),$fileNameHash);
    
            $dataUploadTrait =[
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath),
            ];
            return $dataUploadTrait;
        }
        else return null;

    }
}