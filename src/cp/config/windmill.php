<?php

return [
    'theme' => [

        /**
         * Supported: "light", "dark" and "auto"
         */
        'mode' => env('WINDMILL_MODE', 'auto'),

        /**
         * if mode is auto then the theme will be use this values to change mode in sunset or sunrise
         * 
         * latitude and longitude of you'r city
         * zenith is the angle between the center of the sun and a line perpendicular to earth's surface
         */
        'latitude' => env('WINDMILL_LATITUDE', 24.774265),
        'longitude' => env('WINDMILL_LONGITUDE', 46.738586),
        'zenith' => env('WINDMILL_ZENITH', 90.50),
    ]
];