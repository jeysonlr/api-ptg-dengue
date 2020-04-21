<?php

declare(strict_types=1);

namespace Dengue;

use Zend\Expressive\Application;
use Psr\Container\ContainerInterface;
use Dengue\Handler\PostUserDengueHandler;
use Dengue\Handler\GetAllUserDengueHandler;
use Dengue\Handler\PostDenunciasDengueHandler;
use Dengue\Handler\GetAllDenunciasDengueHandler;

class RoutesDelegator
{
    /**
     * @var Application
     */
    private $app;

    public function __invoke(ContainerInterface $container, string $serviceName, callable $callback): Application
    {
        $this->app = $callback();

        $this->app->get('/v1/usuariosdengue', [
            // CheckDatabaseConnectionMiddleware::class,
            GetAllUserDengueHandler::class,
        ], 'dengue.get_usuarios');

        $this->app->post('/v1/usuariodengue', [
            PostUserDengueHandler::class,
        ], 'dengue.post_usuarios');

        $this->app->get('/v1/denunciasdengue', [
            // CheckDatabaseConnectionMiddleware::class,
            GetAllDenunciasDengueHandler::class,
        ], 'dengue.get_denuncias');

        $this->app->post('/v1/denunciadengue', [
            PostDenunciasDengueHandler::class,
        ], 'dengue.post_denuncias');

        return $this->app;
    }
}
