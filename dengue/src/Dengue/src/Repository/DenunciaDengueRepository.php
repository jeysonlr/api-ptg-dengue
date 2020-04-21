<?php

declare(strict_types=1);

namespace Dengue\Repository;

use Exception;
use App\Util\Enum\StatusHttp;
use App\Util\Enum\ErrorMessage;
use Dengue\Entity\DenunciaDengue;
use Doctrine\ORM\EntityRepository;
use Dengue\Exception\DenunciaDengueDatabaseException;

class DenunciaDengueRepository extends EntityRepository implements DenunciaDengueRepositoryInterface
{
    /**
     * @param DenunciaDengue $user
     * @return void
     */
    public function insertDenuncia(DenunciaDengue $postDenuncia): void
    {
        try {
            $this->getEntityManager()->persist($postDenuncia);
            $this->getEntityManager()->flush();
        } catch (Exception $e) {
            throw new DenunciaDengueDatabaseException(
                StatusHttp::INTERNAL_SERVER_ERROR,
                ErrorMessage::ERROR_INSERTING_RECORD,
                $e->getMessage()
            );
        }
    }

    /**
     * @param DenunciaDengue $postDenuncia
     * @return void
     */
    public function updateDenuncia(DenunciaDengue $postDenuncia): void
    {
        try {
            $this->getEntityManager()->merge($postDenuncia);
            $this->getEntityManager()->flush();
        } catch (Exception $e) {
            throw new DenunciaDengueDatabaseException(
                StatusHttp::INTERNAL_SERVER_ERROR,
                ErrorMessage::ERROR_REGISTRY_CHANGE,
                $e->getMessage()
            );
        }
    }

    /**
     * @param integer $idDenunciaDengue
     * @return DenunciaDengue|null
     */
    public function findByIdDenuncia(int $idDenunciaDengue): ?DenunciaDengue
    {
        try {
            return $this->getEntityManager()->getRepository(DenunciaDengue::class)
                ->findOneBy(['iddenunciadengue' => $idDenunciaDengue]);
        } catch (Exception $e) {
            throw new DenunciaDengueDatabaseException(
                StatusHttp::INTERNAL_SERVER_ERROR,
                ErrorMessage::ERROR_QUERY_A_RECORD . "iddenunciadengue",
                $e->getMessage()
            );
        }
    }

    /**
     * @return array|null
     */
    public function findAllDenuncias(): ?array
    {
        try {
            return $this->getEntityManager()->getRepository(DenunciaDengue::class)->findAll();
        } catch (Exception $e) {
            throw new DenunciaDengueDatabaseException(
                StatusHttp::INTERNAL_SERVER_ERROR,
                ErrorMessage::ERROR_QUERY_ALL_RECORD,
                $e->getMessage()
            );
        }
    }
}
