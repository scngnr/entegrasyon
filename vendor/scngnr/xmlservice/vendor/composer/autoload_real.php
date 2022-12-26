<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4b96d568714d617d65b7905e8b2a7882
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

        spl_autoload_register(array('ComposerAutoloaderInit4b96d568714d617d65b7905e8b2a7882', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit4b96d568714d617d65b7905e8b2a7882', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        \Composer\Autoload\ComposerStaticInit4b96d568714d617d65b7905e8b2a7882::getInitializer($loader)();

        $loader->register(true);

        return $loader;
    }
}
