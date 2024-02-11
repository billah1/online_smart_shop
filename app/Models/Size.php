<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected static $size;

    public static function storesize($request){

        self::$size    = new Size();
        self::saveBasicInfo(self::$size,$request);

    }

    public static function updatesize($size,$request){


        self::saveBasicInfo($size,$request);

    }


    public static function saveBasicInfo($size,$request){

        $size->name             =  $request->name;
        $size->code             =  $request->code;
        $size->description      =  $request->description;
        $size->status           =  $request->status;
        $size->save();

    }
    public static function deletesize($size){
        $size->delete();
    }
}
