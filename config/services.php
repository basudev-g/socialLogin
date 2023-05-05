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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => "6202617293159407",
        'client_secret' => "8848733a9b8925e1e284e7cbaaf35431",
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id' => "1533113536486207488-tOhWBY1CDGPcQ2BwfoD1S9ds4HZZOm",
        'client_secret' => "hx8Fh7yRqJzduwqJBpPa9TJYXmOXwqOYDH1NeBZMKG8hF",
        'redirect' => 'http://127.0.0.1:8000/auth/twitter/callback',
    ],

    'google' => [
        'client_id' => "355693960111-45e87bpg6dnmkqkdc7j901otr2snnuab.apps.googleusercontent.com",
        'client_secret' => "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",
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
