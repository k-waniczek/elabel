<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application, which will be used when the
    | framework needs to place the application's name in a notification or
    | other UI elements where an application name needs to be displayed.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | the application so that it's available within Artisan commands.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. The timezone
    | is set to "UTC" by default as it is suitable for most use cases.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by Laravel's translation / localization methods. This option can be
    | set to any locale for which you plan to have translation strings.
    |
    */

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    'wine_types' => [
        'White', 
        'Red', 
        'Rosé', 
        'Sparkling', 
        'Fortified', 
        'Orange'
    ],

    'wine_styles' => [
        'Dry', 
        'Medium dry', 
        'Medium sweet', 
        'Sweet'
    ],

    'wine_sugar_contents' => [
        'Brut nature', 
        'Extra brut', 
        'Brut', 
        'Extra dry',
        'Dry',
        'Medium dry',
        'Medium sweet',
        'Sweet'
    ],

    'gases' =>  [
        '(none)', 
        'Bottling may happen in a protective atmosphere', 
        'Bottled in a protective atmosphere'
    ],

    'ingredient_categories' => [
        'Other', 
        'Acidity regulator', 
        'Antioxidant', 
        'Clarifying agent',
        'Correction of defect',
        'Enrichment substance',
        'Enzyme',
        'Activators of alcoholic and malolactic fermentation',
        'Fermentation agent',
        'Gases and packaging gas',
        'Preservative',
        'Raw material',
        'Sequestrant',
        'Stabiliser',
        'Sweetener'
    ],

    'ingredients' => [
        ['name' => 'Aleppo pine resin', 'category' => 'Other', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Ascorbic acid', 'category' => 'Antioxidant', 'enumber' => 300, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Calcium sulphate', 'category' => 'AcidityRegulator', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Caramel', 'category' => 'Other', 'enumber' => 150, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Carbon dioxide', 'category' => 'RawMaterial', 'enumber' => 290, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Carboxymethylcellulose', 'category' => 'Stabiliser', 'enumber' => 469, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Citric acid', 'category' => 'Stabiliser', 'enumber' => 330, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Concentrated grape must', 'category' => 'EnrichmentSubstance', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Concentrated grape must', 'category' => 'RawMaterial', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Concentrated grape must', 'category' => 'Sweetener', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Dimethyldicarbonate', 'category' => 'Preservative', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Egg', 'category' => 'ClarifyingAgent', 'enumber' => 0, 'allergen' => 1, 'custom' => 0, 'user_id' => null],
        ['name' => 'Egg', 'category' => 'Preservative', 'enumber' => 0, 'allergen' => 1, 'custom' => 0, 'user_id' => null],
        ['name' => 'Expedition liqueur', 'category' => 'RawMaterial', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Fumaric acid', 'category' => 'Stabiliser', 'enumber' => 297, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Grapes', 'category' => 'RawMaterial', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Gum arabic', 'category' => 'Stabiliser', 'enumber' => 414, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Lactic acid', 'category' => 'AcidityRegulator', 'enumber' => 270, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Malic acid', 'category' => 'AcidityRegulator', 'enumber' => 296, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Metatartaric acid', 'category' => 'Stabiliser', 'enumber' => 353, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Milk', 'category' => 'ClarifyingAgent', 'enumber' => 0, 'allergen' => 1, 'custom' => 0, 'user_id' => null],
        ['name' => 'Milk casein', 'category' => 'ClarifyingAgent', 'enumber' => 0, 'allergen' => 1, 'custom' => 0, 'user_id' => null],
        ['name' => 'Milk products', 'category' => 'ClarifyingAgent', 'enumber' => 0, 'allergen' => 1, 'custom' => 0, 'user_id' => null],
        ['name' => 'Milk protein', 'category' => 'ClarifyingAgent', 'enumber' => 0, 'allergen' => 1, 'custom' => 0, 'user_id' => null],
        ['name' => 'Potassium polyaspartate', 'category' => 'Stabiliser', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Potassium sorbate', 'category' => 'Preservative', 'enumber' => 202, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Sucrose', 'category' => 'EnrichmentSubstance', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Sugar', 'category' => 'EnrichmentSubstance', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Sugar', 'category' => 'Sweetener', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Sulphites', 'category' => 'Preservative', 'enumber' => 0, 'allergen' => 1, 'custom' => 0, 'user_id' => null],
        ['name' => 'Tartaric acid', 'category' => 'AcidityRegulator', 'enumber' => 334, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Tirage liqueur', 'category' => 'RawMaterial', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null],
        ['name' => 'Yeast mannoproteins', 'category' => 'Stabiliser', 'enumber' => 0, 'allergen' => 0, 'custom' => 0, 'user_id' => null]
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
