<?php

declare(strict_types=1);

namespace Dengue\Service\DenunciaDengue;

use Dengue\Entity\DenunciaDengue;

interface PostDenunciaDengueServiceInterface
{

    /**
     * @param DenunciaDengue $postDenuncia
     * @return void
     */
    public function postDenunciaDengue(DenunciaDengue $postDenuncia): void;
}
