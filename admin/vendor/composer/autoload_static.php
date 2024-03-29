<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit635b63bf5b8ceeb22c12f8395b85539e
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/src/Twilio',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit635b63bf5b8ceeb22c12f8395b85539e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit635b63bf5b8ceeb22c12f8395b85539e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit635b63bf5b8ceeb22c12f8395b85539e::$classMap;

        }, null, ClassLoader::class);
    }
}
