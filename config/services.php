<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '62953192951-rtd8meltnjkq6bn8rcrk59ejb1tt7bi1.apps.googleusercontent.com',
        'client_secret' => '_dWWlDpgZh2IADJLlU11c5PX',
        'redirect' => 'http://localhost:3300/public/index.php/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '1000104977130140',//env('FACEBOOK_CLIENT_ID','1000104977130140'),
        'client_secret' => '3470b0e380265174f198ec2eebbba320',//env('FACEBOOK_SECRET_ID'),
        'redirect' => 'http://localhost:8000/auth/facebook/callback'//env('FACEBOOK_CALLBACK_URL'),
    ],
    'instagram' => [
       // 'client_id' => '1100946246936095',//env('INSTAGRAM_CLIENT_ID','1100946246936095'),
        'client_id' => '361223528173308',//env('INSTAGRAM_CLIENT_ID','1100946246936095'),
        //'client_secret' => '5c98402695d81013722b5fd84238e250',//env('INSTAGRAM_CLIENT_SECRET','5c98402695d81013722b5fd84238e250'),
        'client_secret' => '34090222e244da2e07857da321550694',//env('INSTAGRAM_CLIENT_SECRET','5c98402695d81013722b5fd84238e250'),
        'redirect' => 'https://localhost:8000/login/instagram/callback',
   ],
];

