<?php

declare(strict_types=1);

namespace Dengue\Repository;

use Dengue\Entity\DenunciaDengue;

interface DenunciaDengueRepositoryInterface
{
    /**
     * @param DenunciaDengue $postDenuncia
     * @return void
     */
    public function insertDenuncia(DenunciaDengue $postDenuncia): void;

    /**
     * @param DenunciaDengue $postDenuncia
     * @return void
     */
    public function updateDenuncia(DenunciaDengue $postDenuncia): void;

    /**
     * @param integer $idDenunciaDengue
     * @return DenunciaDengue|null
     */
    public function findByIdDenuncia(int $idDenunciaDengue): ?DenunciaDengue;

    /**
     * @return array|null
     */
    public function findAllDenuncias(): ?array;
}
