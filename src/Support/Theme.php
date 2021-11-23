<?php

namespace Saeedsalem\Windmill\Support;

class Theme{

    public static function darkMode()
    {
        $mode = setting('general.style')??config('windmill.theme.mode');
        // if(auth()->check()){
        //     $mode = 'dark';
        // }

        if($mode == 'light'){
            return false;
        }elseif($mode == 'dark'){
            return true;
        }

        return !(date_sunrise(time(), latitude: config('windmill.theme.latitude'), longitude: config('windmill.theme.longitude'), zenith: config('windmill.theme.zenith'), returnFormat: SUNFUNCS_RET_TIMESTAMP) <= time() && time() <= date_sunset(time(), latitude: config('windmill.theme.latitude'), longitude: config('windmill.theme.longitude'), zenith: config('windmill.theme.zenith'), returnFormat: SUNFUNCS_RET_TIMESTAMP));
    }
}