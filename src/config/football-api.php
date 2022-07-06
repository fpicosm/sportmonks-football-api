<?php

return [
    'api_token' => env('SPORTMONKS_TOKEN'),
    'api_timezone' => env('SPORTMONKS_TIMEZONE') ?: env('APP_TIMEZONE'),
];
