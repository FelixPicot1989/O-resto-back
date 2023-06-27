<?php

namespace App\Controller\Api;

use App\Entity\Review;
use App\Repository\ReviewRepository;
use Doctrine\ORM\EntityNotFoundException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
        $allReviews = $reviewRepository->findAll();
        return $this->json200($allReviews, ["review_browse"]);
    }
    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, ReviewRepository $reviewRepository): JsonResponse
    {
        $review = $reviewRepository->find($id);
        // gestion of 404
        if ($review === null) {
            // ! API -> we don't have HTML
            return $this->json(
                [
                    "message" => "Cet avis n'existe pas"
                ],
                // code status : 404
                Response::HTTP_NOT_FOUND
            );
        }
        return $this->json(
            $review,
            200,
            [],
            [
                "groups" =>
                [
                    "review_read",
                ]
            ]
        );
    }

    /**
     * add new review
     *
     * @Route("",name="add", methods={"POST"})
     *
     * @return JsonResponse
     */
    public function add(Request $request, SerializerInterface $serializerInterface, ReviewRepository $reviewRepository, ValidatorInterface $validatorInterface)
    {
        $user = $this->getUser();

        // In request, I need the content
        $jsonContent = $request->getContent();

        try { // try to deserialiser
            /** @var Review $newReview */
            $newReview = $serializerInterface->deserialize($jsonContent, Review::class, 'json');
            
        } catch (EntityNotFoundException $e){
            
            return $this->json("Denormalisation : ". $e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (Exception $exception){
            
            return $this->json("JSON Invalide : " . $exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        $errors = $validatorInterface->validate($newReview);
        // Have errors? 
        if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $newReview->setUser($user);

        $reviewRepository->add($newReview, true);

        return $this->json(

            $newReview,
            //status 201 for created object
            Response::HTTP_CREATED,

            [],
            // the context because we serialize an object
            [
                "groups" =>
                [
                    // I use an existing group
                    "review_read",
                    
                ]
            ]
        );
    }
/**
     * edit review
     *
     * @Route("/{id}",name="edit", requirements={"id"="\d+"}, methods={"PUT", "PATCH"})
     * 
     * 
     * @param Request $request 
     * @param SerializerInterface $serializerInterface
     * @param ReviewRepository $reviewRepository
     */
    public function edit($id, Request $request, SerializerInterface $serializerInterface, ReviewRepository $reviewRepository)
    {
        // Update Review
        // 1. take back a JSON content
        $jsonContent = $request->getContent();
        // 2. we cherch an existant review with id
        $review = $reviewRepository->find($id);
        // 3. deserialize and update the object
        $serializerInterface->deserialize(
            // content
            $jsonContent,
            // object type
            Review::class,
            // data format
            'json',
            // I want to POPULATE my review object 
            [AbstractNormalizer::OBJECT_TO_POPULATE => $review]
        );
        // 4. flush
        $reviewRepository->add($review, true);

        // return 200
        return $this->json($review,Response::HTTP_OK, [], ["groups"=>["review_read","user_read"]]);
    }

    /**
     * delete review
     * 
     * 
     * @Route("/{id}",name="delete", requirements={"id"="\d+"}, methods={"DELETE"})
     */
    public function delete($id, ReviewRepository $reviewRepository)
    {
        $review = $reviewRepository->find($id);
        $reviewRepository->remove($review, true);

        return $this->json(null,Response::HTTP_NO_CONTENT);
    }

}
