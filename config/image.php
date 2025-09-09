<?php

return
[

    /*
    |--------------------------------------------------------------------------
    | Driver
    |--------------------------------------------------------------------------
    |
    |
    */
    'driver' => 'GD',

     /*
     |--------------------------------------------------------------------------
     | Default image name
     |--------------------------------------------------------------------------
     |
     | If the image name is not entered manually, it will be entered here by default.
     |
     */
    'imageName' => time(),

     /*
     |--------------------------------------------------------------------------
     | Eِxclusive Directory
     |--------------------------------------------------------------------------
     |
     | If the exclusive directory is not entered manually, it will be entered here by default.
     |
     */
    'exclusiveDirectory' => date('Y').DIRECTORY_SEPARATOR.date('m').DIRECTORY_SEPARATOR.date('d'),

    /*
    |--------------------------------------------------------------------------
    | Image Directory
    |--------------------------------------------------------------------------
    |
    | If a dedicated directory for images is not entered manually, it will be entered here by default.
    |
    */
    'imageDirectory' => date('H_i'),

];