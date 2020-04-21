<?php

declare(strict_types=1);

namespace Dengue\Service\DenunciaDengue;

use Dengue\Entity\DenunciaDengue;
use Dengue\Repository\DenunciaDengueRepositoryInterface;

class PostDenunciaDengueService implements PostDenunciaDengueServiceInterface
{
    /**
     * @var DenunciaDengueRepositoryInterface
     */
    private $denunciaDengueRepository;

    public function __construct(
        DenunciaDengueRepositoryInterface $denunciaDengueRepository
    ) {
        $this->denunciaDengueRepository = $denunciaDengueRepository;
    }

    /**
     * @param DenunciaDengue $postDenuncia
     * @return void
     */
    public function postDenunciaDengue(DenunciaDengue $postDenuncia): void
    {
        $this->denunciaDengueRepository->insertDenuncia($postDenuncia);
    }
}
