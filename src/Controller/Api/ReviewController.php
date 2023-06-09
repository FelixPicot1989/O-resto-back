<?php

namespace App\Controller\Api;

use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityNotFoundException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/reviews", name="app_api_review_")
 */
class ReviewController extends CoreApiController
{
    /**
     * list all reviews
     * 
     * @Route("",name="browse", methods={"GET"})
     *
     * @param ReviewRepository $reviewRepository
     * @return JsonResponse
     */
    public function browse(ReviewRepository $reviewRepository): JsonResponse
    {
        $allreviews = $reviewRepository->findAll();
        return $this->json200($allreviews, ["review_browse"]);
    }
    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    // public function read(?review $review,reviewRepository $reviewRepository): JsonResponse
    public function read($id,ReviewRepository $reviewRepository): JsonResponse
    {
        $review = $reviewRepository->find($id);
        // gestion 404
        if ($review === null){
            // ! on est dans une API donc pas de HTML
            // throw $this->createNotFoundException();
            return $this->json(
                // on pense UX : on fournit un message
                [
                    "message" => "Cet avis existe pas"
                ],
                // code status : 404
                Response::HTTP_NOT_FOUND
            );
        }
        return $this->json($review, 200, [], 
            [
                "groups" => 
                [
                    "review_read"
                ]
            ]);
    }

    /**
     * add review
     *
     * @Route("",name="add", methods={"POST"})
     * 
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param ReviewRepository $reviewRepository
     * 
     */
    public function add(
        Request $request, 
        SerializerInterface $serializer, 
        ReviewRepository $reviewRepository)
    {
        // 
        $jsonContent = $request->getContent();
        
        // convert JSON in Doctrine review entity
        try { 
            $review = $serializer->deserialize($jsonContent, review::class, 'json');
        } catch (EntityNotFoundException $e){
            
            return $this->json("Denormalisation : ". $e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (Exception $exception){
            
            return $this->json("JSON Invalide : " . $exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        // save entity
        $reviewRepository->add($review, true);

        return $this->json($review, Response::HTTP_CREATED, [], ["groups"=>["review_read"]]);
    }
}
