<?php

namespace App\Controller\Api;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/restaurants", name="app_api_restaurants_")
 */
class RestaurantController extends CoreApiController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(RestaurantRepository $restaurantRepository): JsonResponse
    {
        //List of restaurant
        // BDD, Restaurant: restaurantRepository
        $allRestaurants = $restaurantRepository->findAll();

        // le serializer is after json method()
        // we need to give to him objects to transform in jsondata
        return $this->json200($allRestaurants, ["restaurant_browse"]);
    }

    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id,RestaurantRepository $restaurantRepository): JsonResponse
    {
        $restaurant = $restaurantRepository->find($id);
        // gestion 404
        if ($restaurant === null){
                // throw $this->createNotFoundException();
            return $this->json(
                [
                    "message" => "Le restaurant recherché n'existe pas"
                ],
                // le code de status : 404
                Response::HTTP_NOT_FOUND
                // on a pas besoin de preciser les autres arguments
            );
        }

        return $this->json200($restaurant,
                [
                    //name of group(s)
                    "restaurant_read"
                ]
            );
    }

}
