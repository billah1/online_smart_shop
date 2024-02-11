<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected  static  $brand,$imageName,$imageFile,$imageDirectory,$imageUrl;


    public static function getImageUrl($request){
        self::$imageFile           = $request->file('image');
        self::$imageName           = self::$imageFile->getClientOriginalName();
        self::$imageDirectory      = 'upload/brand-images/';
        self::$imageFile->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl            = self::$imageDirectory.self::$imageName;
        return self::$imageUrl;
    }
    public static function storebrand($request){
        if ($request->file('image')){
            self::$imageUrl   = self::getImageUrl($request);
        }else{
            self::$imageUrl   = '';
        }
        self::$brand           =   new Brand();
        self::saveBasicInfo(self::$brand,$request,self::$imageUrl);
    }
    public static function updatebrand($brand,$request){
        if ($request->file('image')){
            if ($brand->image){
                unlink($brand->image);
            }
            self::$imageUrl   = self::getImageUrl($request);
        }else{
            self::$imageUrl   = $brand->image;
        }
        self::saveBasicInfo($brand,$request,self::$imageUrl);

    }


    public static function saveBasicInfo($brand,$request,$imageUrl){

        $brand->name         =  $request->name;
        $brand->description  =  $request->description;
        $brand->image        = $imageUrl  ;
        $brand->status       =  $request->status;
        $brand->save();

    }
    public static function deletebrand($brand){
        if ($brand->image){
            unlink($brand->image);
        }
        $brand->delete();
    }
}
