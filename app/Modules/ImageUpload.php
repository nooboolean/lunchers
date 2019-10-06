<?php

namespace App\Modules;

class ImageUpload{
    
    public static function make_image($upload_image){
        return !is_null($upload_image) ? \Image::make(file_get_contents($upload_image->getRealPath())) : false;
    }

    public function sizing_crop($image, $sizing_num, $crop_num){
        $max = $this->max($image->height(), $image->width());
        if( $max == $image->height() ){
            return $image->heighten($sizing_num)->crop($crop_num, $crop_num);
        }else if($max == $image->width()){
            return $image->widen($sizing_num)->crop($crop_num, $crop_num);
        }
    }

    public function save($image, $upload_image){
        $image->save(public_path() . '/images/' . $upload_image->hashName());
    }

    private function max($height, $width){
		return $height >= $width
			? $height
			: $width;
	}
}