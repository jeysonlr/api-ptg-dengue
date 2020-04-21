<?php

declare(strict_types=1);

namespace Dengue\Handler;

use Psr\Container\ContainerInterface;
use Dengue\Service\UserDengue\GetUserDengueService;
use Dengue\Handler\GetAllUserDengueHandler;

class GetAllUserDengueHandlerFactory
{
    public function __invoke(ContainerInterface $container): GetAllUserDengueHandler
    {
        $getUserDengueService = $container->get(GetUserDengueService::class);
        return new GetAllUserDengueHandler(
            $getUserDengueService
        );
    }
}
