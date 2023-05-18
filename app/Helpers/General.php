<?php

use Illuminate\Support\Facades\Config;

    function get_languages(){
        return \App\Models\Language::active() -> Selection() -> get();
    }

    function get_default_lang(){
      return Config::get('app.locale');
    }

    function uploadImage($folder, $image){
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = 'images/' . $folder . '/' . $filename;
        return $path;
    }

    function uploadVideo($folder, $video){
        $video->store('/', $folder);
        $filename = $video->hashName();
        $path = 'video/' . $folder . '/' . $filename;
        return $path;
    }

    function checkData($data){
        return @isset($data) && $data->count()>0;
    }
    function checkMainCategory($mainCategory){
        return $mainCategory->active==1
            && @isset($mainCategory->subCategories) && $mainCategory->subCategories->count()>0
            && @isset($mainCategory->vendors) && $mainCategory->vendors->count()>0
            && @isset($mainCategory->products) && $mainCategory->products->count()>0;
    }
    function checkSubCategory($subCategory){
        return $subCategory->active==1 && @isset($subCategory->mainCategory)
            && @isset($subCategory->vendors) && $subCategory->vendors->count()>0
            && @isset($subCategory->products) && $subCategory->products->count()>0 ;
    }

    function checkVendor($vendor){
        return @isset($vendor->mainCategory)
            && @isset($vendor->subCategory)
            && @isset($vendor->products)
            && $vendor->active==1;
    }
    function checkProduct($product){
        return @isset($product->mainCategory)
            && @isset($product->subCategory)
            && @isset($product->vendor)
            && $product->active==1
            && $product->amount>0;
    }


