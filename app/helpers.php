<?php

if (! function_exists('currentUser')) {
    function currentUser()
    {
        return auth()->user();
    }
}

if (! function_exists('currentRoute')) {

    function currentRoute()
    {
        return request()->route()->getName();
    }
}

if (! function_exists('isDisabled')) {

    function isDisabled($name)
    {
        return request()->route()->getName() == $name ? 'disabled' : '';
    }
}

