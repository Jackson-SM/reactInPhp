<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite52d8a41e31b9e23a36a3582b77ea0ab
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '011e0e53e11d9ecbda2edb52c4e04fd6' => __DIR__ . '/../..' . '/App/Config/config.php',
        '69c0c451ec32fe1260f4543284d804a7' => __DIR__ . '/../..' . '/App/Router/router.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'C' => 
        array (
            'CoffeeCode\\Router\\' => 18,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'CoffeeCode\\Router\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/router/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite52d8a41e31b9e23a36a3582b77ea0ab::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite52d8a41e31b9e23a36a3582b77ea0ab::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite52d8a41e31b9e23a36a3582b77ea0ab::$classMap;

        }, null, ClassLoader::class);
    }
}
