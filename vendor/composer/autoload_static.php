<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit574d5d1faf231c89ae1e94d9f29ca4fe
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit574d5d1faf231c89ae1e94d9f29ca4fe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit574d5d1faf231c89ae1e94d9f29ca4fe::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit574d5d1faf231c89ae1e94d9f29ca4fe::$classMap;

        }, null, ClassLoader::class);
    }
}
