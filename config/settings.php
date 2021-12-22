<?php

return [

    'twitter' => [
        'handle' => env('TWITTER_HANDLE'),
    ],

    'facebook' => [
        'app_id' => env('FACEBOOK_APP_ID'),
    ],

    'comments' => [
        'max' => env('MAX_COMMENT_LEVEL'),
    ],

    'replies' => [
        'max' => env('MAX_REPLIES_TO_COMMENT'),
    ],

];
