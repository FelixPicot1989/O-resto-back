<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityNotFoundException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/api/users", name="app_api_users_")
 */

class UserController extends CoreApiController

{
       /**
     * list all Users
     *
     * @Route("",name="browse", methods={"GET"})
     *
     * @param UserRepository $userRepository
     * @return JsonResponse
     */
    public function browse(UserRepository $userRepository): JsonResponse
    {
        $allUsers = $userRepository->findAll();
        return $this->json200($allUsers, ["user_browse"]);
    }
    /**
     * @Route("/{id}", name="read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);
        // gestion of 404
        if ($user === null) {
            // ! API -> we don't have HTML
            return $this->json(
                [
                    "message" => "Cet utilisateur n'existe pas"
                ],
                // code status : 404
                Response::HTTP_NOT_FOUND
            );
        }
        return $this->json200($user, ["user_read"]);

    }
    
    /**
     * add new user
     *
     * @Route("",name="add", methods={"POST"})
     *
     * @param Request $request
     * @param SerializerInterface $serializerInterface
     * @param UserRepository $userRepository
     * @param ValidatorInterface $validatorInterface
     * @param UserPasswordHasherInterface $userPasswordHasherInterface
     * @return JsonResponse
     */
    public function add(
        Request $request,
        SerializerInterface $serializerInterface,
        UserRepository $userRepository,
        ValidatorInterface $validatorInterface,
        UserPasswordHasherInterface $userPasswordHasherInterface
    ): JsonResponse {


        // In request, I need the content
        $jsonContent = $request->getContent();

        try { // try to deserialiser
            $newUser = $serializerInterface->deserialize($jsonContent, User::class, 'json');
        } catch (EntityNotFoundException $e) {

            return $this->json("Denormalisation : " . $e->getMessage(), Response::HTTP_BAD_REQUEST);
        } catch (Exception $exception) {

            return $this->json("JSON Invalide : " . $exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $errors = $validatorInterface->validate($newUser);
        // Have errors?
        if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $plainPassword = json_decode($request->getContent(), true)['password'];

        if (!empty($plainPassword)) {
            // je hash le mot de passe
            $hashedPassword = $userPasswordHasherInterface->hashPassword($newUser, $plainPassword);
            $newUser->setPassword($hashedPassword);
        }

        $userRepository->add($newUser, true);

        return $this->json(
            $newUser,
            //status 201 for created object
            Response::HTTP_CREATED,
            [],
            // the context because we serialize an object
            [
                "groups" =>
                [
                    // I use an existing group
                    "user_read"
                ]
            ]
        );
    }
    /**
 * edit user
 *
 * @Route("/{id}",name="edit", requirements={"id"="\d+"}, methods={"PUT", "PATCH"})
 *
 *
 * @param int $id
 * @param Request $request
 * @param SerializerInterface $serializerInterface
 * @param UserRepository $userRepository
 * @param UserPasswordHasherInterface $userPasswordHasherInterface
 * @return JsonResponse
 */
public function edit($id, Request $request, SerializerInterface $serializerInterface, UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasherInterface): JsonResponse
{
    $jsonContent = $request->getContent();

    $user = $userRepository->find($id);

    $serializerInterface->deserialize(
        $jsonContent,
        User::class,
        'json',
        // I want to POPULATE my user object
        [AbstractNormalizer::OBJECT_TO_POPULATE => $user]
    );

    $plainPassword = json_decode($request->getContent(), true)['password'];

    if (!empty($plainPassword)) {
        $hashedPassword = $userPasswordHasherInterface->hashPassword($user, $plainPassword);
        $user->setPassword($hashedPassword);
    }

    // Flush changes to the user repository
    $userRepository->add($user, true);


    return $this->json(
        $user,
        Response::HTTP_OK,
        [],
        ["groups" => ["user_read"]]
    );
}
    
    /**
     * delete user
     *
     *
     * @Route("/{id}",name="delete", requirements={"id"="\d+"}, methods={"DELETE"})
     */
    public function delete($id, UserRepository $userRepository)
    {
        $user = $userRepository->find($id);
        $userRepository->remove($user, true);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
