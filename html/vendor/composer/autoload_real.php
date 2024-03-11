<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit3eba7a80e0cd0cb0b8531f9cc13fcf4c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit3eba7a80e0cd0cb0b8531f9cc13fcf4c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit3eba7a80e0cd0cb0b8531f9cc13fcf4c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit3eba7a80e0cd0cb0b8531f9cc13fcf4c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}