<?php

declare(strict_types=1);

namespace Dengue\Service\DenunciaDengue;

interface GetDenunciaDengueServiceInterface
{
    /**
     * @return array|null
     */
    public function getAllDenuncias(): ?array;
}
