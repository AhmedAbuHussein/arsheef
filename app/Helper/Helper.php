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