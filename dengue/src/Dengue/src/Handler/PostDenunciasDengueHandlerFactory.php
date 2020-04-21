<?php

declare(strict_types=1);

namespace Dengue\Handler;

use App\Util\Serialize\SerializeUtil;
use Psr\Container\ContainerInterface;
use Dengue\Service\DenunciaDengue\PostDenunciaDengueService;

class PostDenunciasDengueHandlerFactory
{
    public function __invoke(ContainerInterface $container): PostDenunciasDengueHandler
    {
        $postDenunciaDengueService = $container->get(PostDenunciaDengueService::class);
        $serializeUtil = $container->get(SerializeUtil::class);
        return new PostDenunciasDengueHandler(
            $postDenunciaDengueService,
            $serializeUtil
        );
    }
}
