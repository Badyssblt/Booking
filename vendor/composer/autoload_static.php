<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit38f296e3daff4795f599d1c9905b7c2f
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
        'B' => 
        array (
            'Badys\\Booking\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'Badys\\Booking\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit38f296e3daff4795f599d1c9905b7c2f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit38f296e3daff4795f599d1c9905b7c2f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit38f296e3daff4795f599d1c9905b7c2f::$classMap;

        }, null, ClassLoader::class);
    }
}
