<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected static $subCategory, $imageName, $imageFile, $imageDirectory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$imageFile = $request->file('image');
        self::$imageName = self::$imageFile->getClientOriginalName();
        self::$imageDirectory = 'upload/sub-category-images/';
        self::$imageFile->move(self::$imageDirectory, self::$imageName);
        self::$imageUrl = self::$imageDirectory . self::$imageName;
        return self::$imageUrl;


    }


    public static function storesubcategory($request)
    {
        if ($request->file('image')) {
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = '';
        }

//         self::$imageUrl  = $request->file('image') ? self::getImageUrl($request) :'';

        self::$subCategory = new SubCategory();
        self::saveBasicInfo(self::$subCategory, $request, self::$imageUrl);
    }

    public static function updatesubcategory($request, $subCategory)
    {
        if ($request->file('image')) {
            if (file_exists($subCategory->image)) {
                unlink($subCategory->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $subCategory->image;
        }
        self::saveBasicInfo($subCategory, $request, self::$imageUrl);

    }

    private static function saveBasicInfo($subCategory, $request, $imageUrl)
    {

        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->image = $imageUrl;
        $subCategory->status = $request->status;
        $subCategory->save();

    }

    public static function deletesubcategory($subCategory)
    {

        if (file_exists($subCategory->image)) {
            unlink($subCategory->image);
        }
        $subCategory->delete();
    }
    public function category(){
        return  $this->belongsTo(Category::class);
    }

}
