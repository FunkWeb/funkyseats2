<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Company information
     |--------------------------------------------------------------------------
     |
     | All contact information for the company
     |
     */

    'name' => env('COMPANY_NAME', 'Company name'),

    'web' => env('COMPANY_WEB', 'https://www.example.com'),

    'contact' => [

        'person' => env('COMPANY_CONTACT_PERSON', 'Unknown'),

        'email' => env('COMPANY_CONTACT_EMAIL', 'mail@example.com'),

        'phone' => env('COMPANY_CONTACT_PHONE', 'Unknown'),
    ]
];
