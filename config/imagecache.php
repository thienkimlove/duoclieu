<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Name of route
    |--------------------------------------------------------------------------
    |
    | Enter the routes name to enable dynamic imagecache manipulation.
    | This handle will define the first part of the URI:
    | 
    | {route}/{template}/{filename}
    | 
    | Examples: "images", "img/cache"
    |
    */
   
    'route' => 'img/cache',

    /*
    |--------------------------------------------------------------------------
    | Storage paths
    |--------------------------------------------------------------------------
    |
    | The following paths will be searched for the image filename, submited 
    | by URI. 
    | 
    | Define as many directories as you like.
    |
    */
    
    'paths' => array(
        public_path('files')
    ),

    /*
    |--------------------------------------------------------------------------
    | Manipulation templates
    |--------------------------------------------------------------------------
    |
    | Here you may specify your own manipulation filter templates.
    | The keys of this array will define which templates 
    | are available in the URI:
    |
    | {route}/{template}/{filename}
    |
    | The values of this array will define which filter class
    | will be applied, by its fully qualified name.
    |
    */
   
    'templates' => array(
        'small' => 'Intervention\Image\Templates\Small',
        'medium' => 'Intervention\Image\Templates\Medium',
        'large' => 'Intervention\Image\Templates\Large',
        '287x179' => function($image) {
            return $image->fit(287, 179);
        },
        '301x183' => function($image) {
            return $image->fit(301, 183);
        },
        '126x90' => function($image) {
            return $image->fit(126, 90);
        },
        '46x46' => function($image) {
            return $image->fit(46, 46);
        },
        '220x140' => function($image) {
            return $image->fit(220, 140);
        },
        '119x99' => function($image) {
            return $image->fit(119, 99);
        },
        '432x311' => function($image) {
            return $image->fit(432, 311);
        },
        '276x157' => function($image) {
            return $image->fit(276, 157);
        },
        '224x135' => function($image) {
            return $image->fit(224, 135);
        },
        '190x129' => function($image) {
            return $image->fit(190, 129);
        },
        '303x244' => function($image) {
            return $image->fit(303, 244);
        },
        '453x326' => function($image) {
            return $image->fit(453, 326);
        },
        '275x156' => function($image) {
            return $image->fit(275, 156);
        },

        '120x120' => function($image) {
            return $image->fit(120, 120);
        },
    ),

    /*
    |--------------------------------------------------------------------------
    | Image Cache Lifetime
    |--------------------------------------------------------------------------
    |
    | Lifetime in minutes of the images handled by the imagecache route.
    |
    */
   
    'lifetime' => 43200,

);
