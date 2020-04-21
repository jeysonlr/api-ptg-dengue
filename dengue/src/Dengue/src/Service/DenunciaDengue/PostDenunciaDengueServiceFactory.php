<?php

declare(strict_types=1);

namespace Dengue\Service\DenunciaDengue;

use Doctrine\ORM\EntityManager;
use Dengue\Entity\DenunciaDengue;
use Psr\Container\ContainerInterface;

class PostDenunciaDengueServiceFactory
{
    public function __invoke(ContainerInterface $container): PostDenunciaDengueService
    {
        $entityManager = $container->get(EntityManager::class);
        $denunciaDengueRepository = $entityManager->getRepository(DenunciaDengue::class);
        return new PostDenunciaDengueService(
            $denunciaDengueRepository
        );
    }
}
