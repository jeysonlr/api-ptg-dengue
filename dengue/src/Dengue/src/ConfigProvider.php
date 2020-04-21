<?php

declare(strict_types=1);

namespace Dengue;

use Dengue\RoutesDelegator;
use Zend\Expressive\Application;
use Dengue\Handler\PostUserDengueHandler;
use Dengue\Handler\GetAllUserDengueHandler;
use Dengue\Handler\PostDenunciasDengueHandler;
use Dengue\Handler\GetAllDenunciasDengueHandler;
use Dengue\Handler\PostUserDengueHandlerFactory;
use Dengue\Handler\GetAllUserDengueHandlerFactory;
use Dengue\Handler\PostDenunciasDengueHandlerFactory;
use Dengue\Handler\GetAllDenunciasDengueHandlerFactory;

use Dengue\Service\UserDengue\GetUserDengueService;
use Dengue\Service\UserDengue\PostUserDengueService;
use Dengue\Service\UserDengue\GetUserDengueServiceFactory;
use Dengue\Service\UserDengue\PostUserDengueServiceFactory;

use Dengue\Service\DenunciaDengue\GetDenunciaDengueService;
use Dengue\Service\DenunciaDengue\PostDenunciaDengueService;
use Dengue\Service\DenunciaDengue\GetDenunciaDengueServiceFactory;
use Dengue\Service\DenunciaDengue\PostDenunciaDengueServiceFactory;

/**
 * The configuration provider for the Dengue module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies(): array
    {
        return [
            'delegators' => [
                Application::class => [RoutesDelegator::class]
            ],
            'invokables' => [],
            'factories'  => [

                #usuario dengue
                PostUserDengueHandler::class => PostUserDengueHandlerFactory::class,
                PostUserDengueService::class => PostUserDengueServiceFactory::class,
                GetAllUserDengueHandler::class => GetAllUserDengueHandlerFactory::class,
                GetUserDengueService::class => GetUserDengueServiceFactory::class,

                #denuncia dengue
                GetDenunciaDengueService::class => GetDenunciaDengueServiceFactory::class,
                PostDenunciaDengueService::class => PostDenunciaDengueServiceFactory::class,
                GetAllDenunciasDengueHandler::class => GetAllDenunciasDengueHandlerFactory::class,
                PostDenunciasDengueHandler::class => PostDenunciasDengueHandlerFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'dengue'    => [__DIR__ . '/../templates/'],
            ],
        ];
    }
}
