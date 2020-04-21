<?php

declare(strict_types=1);

namespace Dengue\Service\DenunciaDengue;

use Dengue\Entity\DenunciaDengue;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class GetDenunciaDengueServiceFactory
{
    public function __invoke(ContainerInterface $container): GetDenunciaDengueService
    {
        $entityManager = $container->get(EntityManager::class);
        $denunciaDengueRepository = $entityManager->getRepository(DenunciaDengue::class);
        return new GetDenunciaDengueService(
            $denunciaDengueRepository
        );
    }
}
