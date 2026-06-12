<?php

use Illuminate\Support\Str;
use Pdo\Mysql;

return [



    'default' => env('DB_CONNECTION', 'mysql'),



    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),

            'transaction_mode' => 'DEFERRED',

        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',

            'strict' => true,
            'engine' => null,

        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'ep-sweet-voice-aoh0j8hk.aws-ap-southeast-1.pg.laravel.cloud'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'db_eventtiket_3309'),
            'username' => env('DB_USERNAME', 'db_eventtiket_3309_owner'),
            'password' => env('DB_PASSWORD', 'nO0k6jTSRXfV'),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => 'require',
            'options' => [
                'endpoint' => env('DB_ENDPOINT', 'ep-sweet-voice-aoh0j8hk'),
            ],
        ],

    ],

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],


    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [

            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-database-'),

        ],

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1')
            ,
            'password' => env('REDIS_PASSWORD'),

            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),

        ],

        'cache' => [

            'host' => env('REDIS_HOST', '127.0.0.1'),

            'password' => env('REDIS_PASSWORD'),

            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),

        ],

    ],


];
