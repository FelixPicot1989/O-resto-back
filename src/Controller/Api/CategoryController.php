<?php

namespace App\Controller\Api;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/api/categories", name="app_api_categories_")
 */
class CategoryController extends CoreApiController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(CategoryRepository $categoryRepository): JsonResponse
    {
        //List of categories
        // BDD, category: CategoryRepository
        $allcategories = $categoryRepository->findAll();

        // le serializer is after json method()
        // we need to give to him objects to transform in jsondata
        return $this->json200($allcategories, ["category_browse"]);
    }

    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id,CategoryRepository $categoryRepository): JsonResponse
    {
        $category = $categoryRepository->find($id);
        // gestion of 404
        if ($category === null){
                // throw $this->createNotFoundException();
            return $this->json(
                [
                    "message" => "La catégorie recherchée n'existe pas"
                ],
                // le code de status : 404
                Response::HTTP_NOT_FOUND
                
            );
        }

        return $this->json200($category,
                [
                    //name of group(s)
                    "category_read",
                    "eat_read"
                ]
            );
    }

}
