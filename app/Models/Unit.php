<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected static $unit;

    public static function storeunit($request){

        self::$unit    = new Unit();
        self::saveBasicInfo(self::$unit,$request);

    }

    public static function updateunit($unit,$request){


        self::saveBasicInfo($unit,$request);

    }


    public static function saveBasicInfo($unit,$request){

        $unit->name             =  $request->name;
        $unit->code             =  $request->code;
        $unit->description      =  $request->description;
        $unit->status           =  $request->status;
        $unit->save();

    }
    public static function deleteunit($unit){
        $unit->delete();
    }
}
