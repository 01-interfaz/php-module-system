<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit13d4fb7284d56283aecf1b57b91d37f2
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Interfaz\\MenuSystem\\' => 20,
            'Interfaz\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Interfaz\\MenuSystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/interfaz/php-menu-system/src',
        ),
        'Interfaz\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit13d4fb7284d56283aecf1b57b91d37f2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit13d4fb7284d56283aecf1b57b91d37f2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit13d4fb7284d56283aecf1b57b91d37f2::$classMap;

        }, null, ClassLoader::class);
    }
}
