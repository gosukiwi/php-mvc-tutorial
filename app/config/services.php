<?php
use Joomla\DI\Container;

/**
 * Dependency Injection Container
 */
$container = new Container();

$container->share('config', function () {
    return new App\Lib\Configuration;
});

$container->share('katar', function (Container $c) {
    $config = $c->get('config');
    return new Katar\Katar($config['views_cache']);
});

return $container;
