<?php

declare(strict_types=1);

namespace Dengue\Service\UserDengue;

interface GetUserDengueServiceInterface
{
    /**
     * @return array|null
     */
    public function getAllUsersDengue(): ?array;
}
