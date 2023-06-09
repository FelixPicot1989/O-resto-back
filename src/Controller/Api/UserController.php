<?php

namespace App\Controller\Api;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/users", name="app_api_users_")
 */
class UserController extends CoreApiController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): JsonResponse
    {
        //List of user
        // BDD, user: userRepository
        $allusers = $userRepository->findAll();

        // le serializer is after json method()
        // we need to give to him objects to transform in jsondata
        return $this->json200($allusers, ["user_browse"]);
    }

    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id,UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);
        // gestion 404
        if ($user === null){
                // throw $this->createNotFoundException();
            return $this->json(
                [
                    "message" => "Le user recherché n'existe pas"
                ],
                // le code de status : 404
                Response::HTTP_NOT_FOUND
                // on a pas besoin de preciser les autres arguments
            );
        }

        return $this->json200($user,
                [
                    //name of group(s)
                    "user_read"
                ]
            );
    }

}
