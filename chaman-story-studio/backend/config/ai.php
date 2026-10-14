<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AI Provider
    |--------------------------------------------------------------------------
    |
    | Chaman Story Studio can talk to any OpenAI-compatible chat completions
    | endpoint. When "AI_API_KEY" is empty the application runs in demo mode
    | and uses the deterministic template engine (App\Services\StoryEngine)
    | instead of making any network call.
    |
    */

    'provider' => env('AI_PROVIDER', 'openai'),

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | The secret key used to authenticate with the provider. This value is
    | NEVER returned to the client. Leave it empty to force demo mode.
    |
    */

    'api_key' => env('AI_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    |
    | Base URL of the OpenAI-compatible API. The client appends
    | "/chat/completions" when sending requests.
    |
    */

    'base_url' => env('AI_BASE_URL', 'https://api.openai.com/v1'),

    /*
    |--------------------------------------------------------------------------
    | Model
    |--------------------------------------------------------------------------
    */

    'model' => env('AI_MODEL', 'gpt-4o-mini'),

    /*
    |--------------------------------------------------------------------------
    | Request Timeout
    |--------------------------------------------------------------------------
    |
    | Maximum number of seconds to wait for the provider before falling back
    | to the template engine.
    |
    */

    'timeout' => (int) env('AI_TIMEOUT', 30),

];
