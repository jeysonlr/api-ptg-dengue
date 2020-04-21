<?php

declare(strict_types=1);

namespace Dengue\Handler;

use Exception;
use App\Util\Enum\StatusHttp;
use Dengue\Entity\UserDengue;
use App\Util\Enum\SuccessMessage;
use App\Exception\SerializeException;
use App\Service\Response\ApiResponse;
use App\Util\Serialize\SerializeUtil;
use Psr\Http\Message\ResponseInterface;
use Dengue\Service\PostUserDengueService;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Dengue\Exception\UserDengueDatabaseException;
use Dengue\Service\UserDengue\PostUserDengueServiceInterface;

class PostUserDengueHandler implements RequestHandlerInterface
{
    /**
     * @var PostUserDengueServiceInterface
     */
    private $postUserDengueService;

    /**
     * @var SerializeUtil
     */
    private $serializeUtil;

    public function __construct(
        PostUserDengueServiceInterface $postUserDengueService,
        SerializeUtil $serializeUtil
    ) {
        $this->postUserDengueService = $postUserDengueService;
        $this->serializeUtil = $serializeUtil;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $userDengue = $this->serializeUtil->deserialize(
                $request->getBody()->getContents(),
                UserDengue::class,
                'json'
            );

            $this->postUserDengueService->postUser($userDengue);

            return new ApiResponse(
                SuccessMessage::SAVED_RECORD,
                StatusHttp::CREATED,
                ApiResponse::SUCCESS
            );
        } catch (UserDengueDatabaseException $e) {
            return new ApiResponse($e->getCustomError(), $e->getCode(), ApiResponse::ERROR);
        } catch (SerializeException $e) {
            return new ApiResponse($e->getCustomError(), $e->getCode(), ApiResponse::ERROR);
        } catch (Exception $e) {
            return new ApiResponse($e->getMessage(), $e->getCode(), ApiResponse::ERROR);
        }
    }
}
