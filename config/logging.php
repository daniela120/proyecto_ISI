<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Carbon\Carbon;
return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
        ],

        'slack' => [
            'driver' => 'slack',
            'url' => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji' => ':boom:',
            'level' => env('LOG_LEVEL', 'critical'),
        ],

        'papertrail' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => SyslogUdpHandler::class,
            'handler_with' => [
                'host' => env('PAPERTRAIL_URL'),
                'port' => env('PAPERTRAIL_PORT'),
            ],
        ],

        'stderr' => [
            'driver' => 'monolog',
            'level' => env('LOG_LEVEL', 'debug'),
            'handler' => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with' => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],

     
      'CargoEmpleadoHis' => [
        'driver' => 'single', 
        'path' => storage_path('logs/CargoEmpleadoHis-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'CargoEmpleado' => [
        'driver' => 'single', 
        'path' => storage_path('logs/CargoEmpleado-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],


      'Categorias' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Categorias-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Clientes' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Clientes-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Descuentos' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Descuentos-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Empleado' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Empleado-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],


    'Estadoenvios' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Estadoenvios-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Factura' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Factura-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Inventarios' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Inventarios-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'isv' => [
        'driver' => 'single', 
        'path' => storage_path('logs/isv-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Pedidos' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Pedidos-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'PrecioHisCompras' => [
        'driver' => 'single', 
        'path' => storage_path('logs/PrecioHisCompras-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'PrecioHisInventario' => [
        'driver' => 'single', 
        'path' => storage_path('logs/PrecioHisInventario-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

      'PrecioHisMenu' => [
        'driver' => 'single', 
        'path' => storage_path('logs/PrecioHisMenu-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Productos' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Productos-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Proveedores' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Proveedores-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Salarioshis' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Salarioshis-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Tipodocumentos' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Tipodocumentos-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Tiposdepago' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Tiposdepago-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'Turnos' => [
        'driver' => 'single', 
        'path' => storage_path('logs/Turnos-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    'User' => [
        'driver' => 'single', 
        'path' => storage_path('logs/User-' . (new \DateTime('America/Tegucigalpa'))->format('Y-m-d_H-i-s') . '.log'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],

    
    ],

];
