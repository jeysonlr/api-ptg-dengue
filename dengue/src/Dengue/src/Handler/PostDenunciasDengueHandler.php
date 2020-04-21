<?php

declare(strict_types=1);

namespace Dengue\Handler;

use Exception;
use App\Util\Enum\StatusHttp;
use App\Util\Enum\SuccessMessage;
use Dengue\Entity\DenunciaDengue;
use App\Service\Response\ApiResponse;
use App\Util\Serialize\SerializeUtil;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Dengue\Exception\DenunciaDengueDatabaseException;
use Dengue\Service\DenunciaDengue\PostDenunciaDengueServiceInterface;

class PostDenunciasDengueHandler implements RequestHandlerInterface
{
    /** 
     * @var PostDenunciaDengueServiceInterface
     */
    private $postDenunciaDengueService;
    
     /**
     * @var SerializeUtil
     */
    private $serializeUtil;

    public function __construct(
        PostDenunciaDengueServiceInterface $postDenunciaDengueService,
        SerializeUtil $serializeUtil
    ) {
        $this->postDenunciaDengueService = $postDenunciaDengueService;
        $this->serializeUtil = $serializeUtil;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            $denunciaDengue = $this->serializeUtil->deserialize(
                $request->getBody()->getContents(),
                DenunciaDengue::class,
                'json'
            );

            $this->postDenunciaDengueService->postDenunciaDengue($denunciaDengue);
            
            return new ApiResponse(
                SuccessMessage::SAVED_RECORD,
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
