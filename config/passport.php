<?php
if (!function_exists('expandKey')) {
    function expandKey($compressedKey) {
        if (!$compressedKey) return null;
        
        // Si ya tiene saltos de línea, devolverla tal como está
        if (strpos($compressedKey, "\n") !== false) {
            return $compressedKey;
        }
        
        // Extraer header, body y footer
        $patterns = [
            'private' => '/^(-----BEGIN PRIVATE KEY-----)(.*)(-----END PRIVATE KEY-----)$/',
            'public' => '/^(-----BEGIN PUBLIC KEY-----)(.*)(-----END PUBLIC KEY-----)$/',
            'rsa' => '/^(-----BEGIN RSA PRIVATE KEY-----)(.*)(-----END RSA PRIVATE KEY-----)$/'
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $compressedKey, $matches)) {
                $header = $matches[1];
                $body = $matches[2];
                $footer = $matches[3];
                
                // Dividir el body en chunks de 64 caracteres
                $formattedBody = chunk_split($body, 64, "\n");
                
                return $header . "\n" . trim($formattedBody) . "\n" . $footer;
            }
        }
        
        return $compressedKey; // Si no coincide con ningún patrón, devolver original
    }
}

return [

    /*
    |--------------------------------------------------------------------------
    | Passport Guard
    |--------------------------------------------------------------------------
    |
    | Here you may specify which authentication guard Passport will use when
    | authenticating users. This value should correspond with one of your
    | guards that is already present in your "auth" configuration file.
    |
    */

    'guard' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Encryption Keys
    |--------------------------------------------------------------------------
    |
    | Passport uses encryption keys while generating secure access tokens for
    | your application. By default, the keys are stored as local files but
    | can be set via environment variables when that is more convenient.
    |
    */

     'private_key' => expandKey(env('PASSPORT_PRIVATE_KEY')),
    'public_key' => expandKey(env('PASSPORT_PUBLIC_KEY')),

    /*
    |--------------------------------------------------------------------------
    | Passport Database Connection
    |--------------------------------------------------------------------------
    |
    | By default, Passport's models will utilize your application's default
    | database connection. If you wish to use a different connection you
    | may specify the configured name of the database connection here.
    |
    */

    'connection' => env('PASSPORT_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Client UUIDs
    |--------------------------------------------------------------------------
    |
    | By default, Passport uses auto-incrementing primary keys when assigning
    | IDs to clients. However, if Passport is installed using the provided
    | --uuids switch, this will be set to "true" and UUIDs will be used.
    |
    */

    'client_uuids' => true,

    /*
    |--------------------------------------------------------------------------
    | Personal Access Client
    |--------------------------------------------------------------------------
    |
    | If you enable client hashing, you should set the personal access client
    | ID and unhashed secret within your environment file. The values will
    | get used while issuing fresh personal access tokens to your users.
    |
    */

    'personal_access_client' => [
        'id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
        'secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
    ],

];
