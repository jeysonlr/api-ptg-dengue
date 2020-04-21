<?php

declare(strict_types=1);

namespace Dengue\Service\UserDengue;

use Dengue\Entity\UserDengue;
use Dengue\Repository\UserDengueRepositoryInterface;

class PostUserDengueService implements PostUserDengueServiceInterface
{
    /**
     * @var UserDengueRepositoryInterface
     */
    private $userDengueRepository;

    /**
     * @param UserDengueRepositoryInterface $userDengueRepository
     */
    public function __construct(
        UserDengueRepositoryInterface $userDengueRepository
    ) {
        $this->userDengueRepository = $userDengueRepository;
    }

    /**
     * @param UserDengue $user
     * @return void
     */
    public function postUser(UserDengue $user): void
    {
        $this->userDengueRepository->insertUser($user);
    }
}
