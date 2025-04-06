<?php

if (!function_exists('imageUrl')) {
    function imageUrl($image)
    {
        return env('ADMIN_PANEL_URL') . '/' . ltrim(env('SLIDER_IMAGES_PATH'), '/') . '/' . ltrim($image, '/');
    }
}



