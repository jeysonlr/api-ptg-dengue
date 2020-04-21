<?php

declare(strict_types=1);

namespace Dengue\Repository;

use Dengue\Entity\UserDengue;

interface UserDengueRepositoryInterface
{
    /**
     * @param UserDengue $user
     * @return void
     */
    public function insertUser(UserDengue $user): void;

    /**
     * @param UserDengue $user
     * @return void
     */
    public function updateUser(UserDengue $user): void;

    /**
     * @param integer $idDengueUsuario
     * @return UserDengue|null
     */
    public function findByIdTccUsuario(int $idDengueUsuario): ?UserDengue;

     /**
      * @return array|null
      */
    public function findAllUsers(): ?array;
}
