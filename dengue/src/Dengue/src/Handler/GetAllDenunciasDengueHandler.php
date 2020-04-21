<?php

declare(strict_types=1);

namespace Dengue\Handler;

use Exception;
use App\Util\Enum\StatusHttp;
use App\Service\Response\ApiResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Dengue\Exception\DenunciaDengueDatabaseException;
use Dengue\Service\DenunciaDengue\GetDenunciaDengueServiceInterface;

class GetAllDenunciasDengueHandler implements RequestHandlerInterface
{
    /**
     * @var GetDenunciaDengueServiceInterface
     */
    private $getDenunciasDengueService;

    public function __construct(
        GetDenunciaDengueServiceInterface $getDenunciasDengueService
    ) {
        $this->getDenunciasDengueService = $getDenunciasDengueService;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $denuncias = $this->getDenunciasDengueService->getAllDenuncias();

            return new ApiResponse(
                $denuncias,
                StatusHttp::OK,
                ApiResponse::SUCCESS
            );
        } catch (DenunciaDengueDatabaseException $e) {
            return new ApiResponse($e->getCustomError(), $e->getCode(), ApiResponse::ERROR);
        } catch (Exception $e) {
            return new ApiResponse($e->getMessage(), $e->getCode(), ApiResponse::ERROR);
        }
    }
}
