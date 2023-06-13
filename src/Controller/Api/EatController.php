<?php

namespace App\Controller\Api;

use App\Repository\EatRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/eats", name="app_api_eats_")
 */
class EatController extends CoreApiController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(EatRepository $eatRepository): JsonResponse
    {
        //List of eats
        // BDD, Eats: EatRepository
        $allEats = $eatRepository->findAll();

        // le serializer is after json method()
        // we need to give to him objects to transform in jsondata
        return $this->json200($allEats, ["eat_browse"]);
    }

    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id,EatRepository $eatRepository): JsonResponse
    {
        $eat = $eatRepository->find($id);
        // gestion of 404
        if ($eat === null){
                // throw $this->createNotFoundException();
            return $this->json(
                [
                    "message" => "Le plat recherché n'existe pas"
                ],
                // le code de status : 404
                Response::HTTP_NOT_FOUND
                
            );
        }

        return $this->json200($eat,
                [
                    //name of group(s)
                    "eat_read"
                ]
            );
    }

}
