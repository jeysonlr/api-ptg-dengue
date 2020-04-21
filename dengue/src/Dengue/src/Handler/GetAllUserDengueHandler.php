<?php

declare(strict_types=1);

namespace Dengue\Handler;

use Exception;
use App\Util\Enum\StatusHttp;
use App\Service\Response\ApiResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Dengue\Exception\UserDengueDatabaseException;
use Dengue\Service\UserDengue\GetUserDengueServiceInterface;

class GetAllUserDengueHandler implements RequestHandlerInterface
{
    /**
     * @var GetUserDengueServiceInterface
     */
    private $getUserDengueService;

    public function __construct(
        GetUserDengueServiceInterface $getUserDengueService
    ) {
        $this->getUserDengueService = $getUserDengueService;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $user = $this->getUserDengueService->getAllUsersDengue();
            return new ApiResponse(
                $user,
                StatusHttp::OK,
                ApiResponse::SUCCESS
            );
        } catch (UserDengueDatabaseException $e) {
            return new ApiResponse($e->getCustomError(), $e->getCode(), ApiResponse::ERROR);
        } catch (Exception $e) {
            return new ApiResponse($e->getMessage(), $e->getCode(), ApiResponse::ERROR);
        }
    }
}
