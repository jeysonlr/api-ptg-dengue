<?php

declare(strict_types=1);

namespace Dengue\Service\UserDengue;

use Dengue\Repository\UserDengueRepository;

class GetUserDengueService implements GetUserDengueServiceInterface
{
    /**
     *
     * @var UserDengueRepository
     */
    private $userDengueRepository;

    public function __construct(
        UserDengueRepository $userDengueRepository
    ) {
        $this->userDengueRepository = $userDengueRepository;
    }

    /**
     * @return array|null
     */
    public function getAllUsersDengue(): ?array
    {
        return $this->userDengueRepository->findAllUsers();
    }
}
