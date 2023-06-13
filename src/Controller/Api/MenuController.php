<?php

namespace App\Controller\Api;

use App\Repository\MenuRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/menus", name="app_api_menus_")
 */
class MenuController extends CoreApiController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(MenuRepository $menuRepository): JsonResponse
    {
        //List of menus
        // BDD, menu: MenuRepository
        $allmenus = $menuRepository->findAll();

        // le serializer is after json method()
        // we need to give to him objects to transform in jsondata
        return $this->json200($allmenus, ["menu_browse"]);
    }

    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id,MenuRepository $menuRepository): JsonResponse
    {
        $menu = $menuRepository->find($id);
        // gestion of 404
        if ($menu === null){
                // throw $this->createNotFoundException();
            return $this->json(
                [
                    "message" => "Le menu recherché n'existe pas"
                ],
                // le code de status : 404
                Response::HTTP_NOT_FOUND
                
            );
        }

        return $this->json200($menu,
                [
                    //name of group(s)
                    "menu_read"
                ]
            );
    }

}
