<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit363696b045bac71a04b5fbf97db0eaa6
{
    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zhangjianping\\Frequency\\' => 24,
        ),
        'P' => 
        array (
            'Predis\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zhangjianping\\Frequency\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Predis\\' => 
        array (
            0 => __DIR__ . '/..' . '/predis/predis/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit363696b045bac71a04b5fbf97db0eaa6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit363696b045bac71a04b5fbf97db0eaa6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
