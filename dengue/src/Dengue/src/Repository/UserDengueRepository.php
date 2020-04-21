<?php

declare(strict_types=1);

namespace Dengue\Repository;

use Exception;
use App\Util\Enum\StatusHttp;
use Dengue\Entity\UserDengue;
use App\Util\Enum\ErrorMessage;
use Doctrine\ORM\EntityRepository;
use Dengue\Exception\UserDengueDatabaseException;

class UserDengueRepository extends EntityRepository implements UserDengueRepositoryInterface
{
    /**
     * @param UserDengue $user
     * @return void
     */
    public function insertUser(UserDengue $user): void
    {
        try {
            $this->getEntityManager()->persist($user);
            $this->getEntityManager()->flush();
        } catch (Exception $e) {
            throw new UserDengueDatabaseException(
                StatusHttp::INTERNAL_SERVER_ERROR,
                ErrorMessage::ERROR_INSERTING_RECORD,
                $e->getMessage()
            );
        }
    }

    /**
     * @param UserDengue $user
     * @return void
     */
    public function updateUser(UserDengue $user): void
    {
        try {
            $this->getEntityManager()->merge($user);
            $this->getEntityManager()->flush();
        } catch (Exception $e) {
            throw new UserDengueDatabaseException(
                StatusHttp::INTERNAL_SERVER_ERROR,
                ErrorMessage::ERROR_REGISTRY_CHANGE,
                $e->getMessage()
            );
        }
    }

    /**
     * @param integer $idDengueUsuario
     * @return UserDengue|null
     */
    public function findByIdTccUsuario(int $idDengueUsuario): ?UserDengue
    {
        try {
            return $this->getEntityManager()->getRepository(UserDengue::class)
                ->findOneBy(['iddengueuser' => $idDengueUsuario]);
        } catch (Exception $e) {
            throw new UserDengueDatabaseException(
                StatusHttp::INTERNAL_SERVER_ERROR,
                ErrorMessage::ERROR_QUERY_A_RECORD . "iddengueuser",
                $e->getMessage()
            );
        }
    }

    /**
     * @return array|null
     */
    public function findAllUsers(): ?array
    {
        try {
            return $this->getEntityManager()->getRepository(UserDengue::class)->findAll();
        } catch (Exception $e) {
            throw new UserDengueDatabaseException(
                StatusHttp::INTERNAL_SERVER_ERROR,
                ErrorMessage::ERROR_QUERY_ALL_RECORD,
                $e->getMessage()
            );
        }
    }
}
