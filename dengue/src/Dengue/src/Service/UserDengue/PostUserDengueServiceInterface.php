<?php

declare(strict_types=1);

namespace Dengue\Service\UserDengue;

use Dengue\Entity\UserDengue;

interface PostUserDengueServiceInterface
{
    /**
     * @param UserDengue $user
     * @return void
     */
    public function postUser(UserDengue $user): void;
}
