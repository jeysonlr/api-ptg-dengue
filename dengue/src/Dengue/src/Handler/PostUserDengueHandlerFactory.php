<?php

declare(strict_types=1);

namespace Dengue\Handler;

use App\Util\Serialize\SerializeUtil;
use Dengue\Service\UserDengue\PostUserDengueService;
use Psr\Container\ContainerInterface;

class PostUserDengueHandlerFactory
{
    public function __invoke(ContainerInterface $container): PostUserDengueHandler
    {
        $postUserDengueService = $container->get(PostUserDengueService::class);
        $serializeUtil = $container->get(SerializeUtil::class);
        return new PostUserDengueHandler(
            $postUserDengueService,
            $serializeUtil
        );
    }
}
