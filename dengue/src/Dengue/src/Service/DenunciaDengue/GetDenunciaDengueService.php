<?php

declare(strict_types=1);

namespace Dengue\Service\DenunciaDengue;

use Dengue\Repository\DenunciaDengueRepositoryInterface;

class GetDenunciaDengueService implements GetDenunciaDengueServiceInterface
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
     * @return array|null
     */
    public function getAllDenuncias(): ?array
    {
        return $this->denunciaDengueRepository->findAllDenuncias();
    }
}
