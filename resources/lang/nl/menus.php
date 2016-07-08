<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Toegangs Beheer',

            'roles' => [
                'all' => 'Alle Rollen',
                'create' => 'Creeer Rol',
                'edit' => 'Rol aanpassen',
                'management' => 'Rol Beheer',
                'main' => 'Rollen',
            ],

            'users' => [
                'all' => 'Alle Gebruikers',
                'change-password' => 'Wachtwoord veranderen',
                'create' => 'Creeer Gebruiker',
                'deactivated' => 'Gedeactiveerde Gebruiker',
                'deleted' => 'Verwijderde Gebruikers',
                'edit' => 'Gebruiker aanpassen',
                'main' => 'Gebruikers',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'Algemeen',
        ],
    ],

    'language-picker' => [
        'language' => 'Taal',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'da' => 'Deens (Danish)',
            'de' => 'Duits (German)',
            'en' => 'Engels (English)',
            'es' => 'Spaans (Spanish)',
            'fr' => 'Frans (French)',
            'it' => 'Italiaans (Italian)',
            'nl' => 'Nederlands (Dutch)',
            'pt-BR' => 'Braziliaans Portugees (Brazilian Portuguese)',
            'sv' => 'Zweeds (Swedish)',

        ],
    ],
];
