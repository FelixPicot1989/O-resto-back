<?php

namespace App\Controller\Api;

use App\Repository\ImageRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/images", name="app_api_images_")
 */
class ImageController extends CoreApiController
{
    /**
     * @Route("", name="browse", methods={"GET"})
     */
    public function browse(ImageRepository $imageRepository): JsonResponse
    {
        //List of images
        // BDD, Images: imageRepository
        $allImages = $imageRepository->findAll();

        // le serializer is after json method()
        // we need to give to him objects to transform in jsondata
        return $this->json200($allImages, ["image_browse"]);
    }


    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, ImageRepository $imageRepository): JsonResponse
    {
        $image = $imageRepository->find($id);
        // gestion of 404
        if ($image === null) {

            return $this->json(
                [
                    "message" => "Cette image n'existe pas"
                ],
                // Code status : 404
                Response::HTTP_NOT_FOUND
            );
        }

        return $this->json200(
            $image,
            [
                //name of group(s)
                "image_read"
            ]
        );
    }
    
}
