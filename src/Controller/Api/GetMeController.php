<?php

namespace App\Controller\Api;



use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Doctrine\ORM\EntityNotFoundException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;


class GetMeController extends CoreApiController
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @Route("/api/users/me", name="app_api_users_me", methods={"GET"})
     */
    public function getUser(): JsonResponse
    {
        // we get the user by using jwt token
        
        $token = $this->tokenStorage->getToken();

        if (null === $token) {
            return null;
        }

        $user = $token->getUser();

        if ($user === null) {
            return $this->json(
                [],
                Response::HTTP_NOT_FOUND
            );
        }
        return $this->json(
            $user,
            200,
            [],
            [
                "groups" =>
                [
                    "user_read",
                ]
            ]);
    }
}
