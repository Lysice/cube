<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc614af3b896321972e60347dc8fb7e8
{
    public static $files = array (
        'ab74a31f4f523b8ed8d7f419d1d40e18' => __DIR__ . '/../..' . '/app/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'C' => 
        array (
            'Core\\Request\\' => 13,
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Core\\Request\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core/Request',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc614af3b896321972e60347dc8fb7e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc614af3b896321972e60347dc8fb7e8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
