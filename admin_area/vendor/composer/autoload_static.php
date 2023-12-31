<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite273027c79a4e854b4fd01bfd13e5922
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite273027c79a4e854b4fd01bfd13e5922::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite273027c79a4e854b4fd01bfd13e5922::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite273027c79a4e854b4fd01bfd13e5922::$classMap;

        }, null, ClassLoader::class);
    }
}
