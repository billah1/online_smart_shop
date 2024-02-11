<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected static $color;

    public static function storecolor($request){

        self::$color    = new Color();
        self::saveBasicInfo(self::$color,$request);

    }

    public static function updatecolor($color,$request){


        self::saveBasicInfo($color,$request);

    }


    public static function saveBasicInfo($color,$request){

        $color->name             =  $request->name;
        $color->code             =  $request->code;
        $color->description      =  $request->description;
        $color->status           =  $request->status;
        $color->save();

    }
    public static function deletecolor($color){
        $color->delete();
    }

}
