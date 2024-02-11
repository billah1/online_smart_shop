<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;


    protected static $productImage,$productImages,$imageName,$extension,$imageFile,$imageDirectory;

    private  static function getImageUrl($image){

        self::$extension       =  $image->getClientOriginalExtension();
        self::$imageName       = rand(0,500000).'.'.self::$extension;
        self::$imageDirectory  = 'upload/product-other-images/';
        $image->move(self::$imageDirectory,self::$imageName);
        return self::$imageDirectory.self::$imageName;

    }

    public static function storeproducimage($images,$id){

        foreach ($images as $image){

            self::$productImage                 = new ProductImage();
            self::$productImage->product_id    = $id;
            self::$productImage->image         = self::getImageUrl($image);
            self::$productImage->save();
        }
    }
    public static function updateProductImage($images,$id){
        self::$productImages   = ProductImage::where('product_id',$id)->get();
        foreach (self::$productImages as $productImage){
            if (file_exists($productImage->image)){
                unlink($productImage->image);
            }
            $productImage->delete();
        }
        self::storeproducimage($images,$id);

    }
}
