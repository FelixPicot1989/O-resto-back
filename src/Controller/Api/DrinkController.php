<?php

namespace App\Controller\Api;

use App\Repository\DrinkRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/drinks", name="app_api_drinks_")
 */
class DrinkController extends CoreApiController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(DrinkRepository $drinkRepository): JsonResponse
    {
        //List of drinks
        // BDD, Drink: drinkRepository
        $allDrinks = $drinkRepository->findAll();

        // the serializer is after json method()
        // we need to give to him objects to transform in jsondata
        return $this->json200($allDrinks, ["drink_browse"]);
    }

    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id,DrinkRepository $drinkRepository): JsonResponse
    {
        $drink = $drinkRepository->find($id);
        // gestion of 404
        if ($drink === null){
                // throw $this->createNotFoundException();
            return $this->json(
                [
                    "message" => "La boisson recherchée n'existe pas"
                ],
                // le code de status : 404
                Response::HTTP_NOT_FOUND
                
            );
        }

        return $this->json200($drink,
                [
                    //name of group(s)
                    "drink_read"
                ]
            );
    }

}
