<?php

declare(strict_types=1);

namespace Dengue\Handler;

use Dengue\Service\DenunciaDengue\GetDenunciaDengueService;
use Psr\Container\ContainerInterface;

class GetAllDenunciasDengueHandlerFactory
{
    public function __invoke(ContainerInterface $container): GetAllDenunciasDengueHandler
    {
        $getDenunciasDengue = $container->get(GetDenunciaDengueService::class);
        return new GetAllDenunciasDengueHandler($getDenunciasDengue);
    }
}
