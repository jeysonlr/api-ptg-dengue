<?php

declare(strict_types=1);

namespace Dengue\Service\UserDengue;

use Dengue\Entity\UserDengue;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class PostUserDengueServiceFactory
{
    public function __invoke(ContainerInterface $container): PostUserDengueService
    {
        $entityManager = $container->get(EntityManager::class);
        $userDengueRepository = $entityManager->getRepository(UserDengue::class);
        return new PostUserDengueService(
            $userDengueRepository
        );
    }
}
