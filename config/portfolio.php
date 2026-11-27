<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Social Profiles
    |--------------------------------------------------------------------------
    |
    | Filled from the environment so the links can change per deployment
    | without touching the views. A link is skipped entirely when its value
    | is empty, so the page never shows a dead button.
    |
    */

    'social' => [
        'github' => env('SOCIAL_GITHUB'),
        'linkedin' => env('SOCIAL_LINKEDIN'),
    ],

];
