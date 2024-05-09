<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit931ef190f59890d96330d1001d23a12b
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'I' => 
        array (
            'ImmoDemo\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'ImmoDemo\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit931ef190f59890d96330d1001d23a12b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit931ef190f59890d96330d1001d23a12b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit931ef190f59890d96330d1001d23a12b::$classMap;

        }, null, ClassLoader::class);
    }
}
