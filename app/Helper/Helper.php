<?php

if (! function_exists('arabicNumbers')) {

    function arabicNumbers($value)
    {
        $value = (string)$value;
        $arabic_eastern = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩', '-','/',':');
        $arabic_western = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-','/',':');
        return str_replace($arabic_western, $arabic_eastern, $value);
    }
}

if (! function_exists('uploadImage')) {

    function uploadImage($file, $folder = 'images', $old = null){
        if(request()->hasFile($file)){
            if(!is_null($old) && is_file($old)){
                unlink($old);
            }
            $name = time().'.'.request()->file($file)->getClientOriginalExtension();
            request()->file($file)->storeAs($folder, $name);
            $name = $folder.'/'.$name;
            return $name;
        }
        return null;
    }

}

if (! function_exists('deleteFileFromStorage')) {

    function deleteFileFromStorage($file, $prefix = null){
        $path = public_path($prefix.$file);
        if(is_file($path)){
            try {
                unlink($path);
            } catch (\Throwable $th) {
                flash("لن نتمكن من حذف $file")->warning();
            }
        }
    }

}