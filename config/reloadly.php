<?php

return [
    /*
    |--------------------------------------------------------------------------
    | api key for Reloadly
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for when a location is not found
    | for the IP provided.
    |
    */
    'client_id' => env('RELOADLY_CLIENT_ID', ''),
    'secret' => env('RELOADLY_SECRET', ''),


   /*
    |--------------------------------------------------------------------------
    | api test key Reloadly
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for when a location is not found
    | for the IP provided.
    |
    */
    'test_client_id' => env('RELOADLY_TEST_CLIENT_ID', ''),
    'test_secret' => env('RELOADLY_TEST_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | is production for Reloadly
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for when a location is not found
    | for the IP provided.
    |
    */
    'is_production' => env('RELOADLY_IS_PRODUCTION', false),
];
