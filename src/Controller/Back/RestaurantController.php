<?php

namespace App\Controller\Back;

use App\Entity\Restaurant;
use App\Form\RestaurantType;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/restaurant")
 */
class RestaurantController extends AbstractController
{
    /**
     * @Route("/", name="app_back_restaurant_index", methods={"GET"})
     */
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('back/restaurant/index.html.twig', [
            'restaurants' => $restaurantRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_restaurant_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RestaurantRepository $restaurantRepository): Response
    {
        $restaurant = new Restaurant();

        $form = $this->createForm(RestaurantType::class, $restaurant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $restaurantRepository->add($restaurant, true);

            $this->addFlash("success", "Votre restaurant a bien été ajouté.");

            return $this->redirectToRoute('app_back_restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/restaurant/new.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_restaurant_show", methods={"GET"})
     */
    public function show(Restaurant $restaurant): Response
    {
        return $this->render('back/restaurant/show.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_restaurant_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Restaurant $restaurant, RestaurantRepository $restaurantRepository): Response
    {
        $form = $this->createForm(RestaurantType::class, $restaurant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $restaurant->setUpdatedAt(new \DateTime());
            
            $restaurantRepository->add($restaurant, true);

            $this->addFlash("success", "Votre restaurant a bien été modifé.");


            return $this->redirectToRoute('app_back_restaurant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/restaurant/edit.html.twig', [
            'restaurant' => $restaurant,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_restaurant_delete", methods={"POST"})
     */
    public function delete(Request $request, Restaurant $restaurant, RestaurantRepository $restaurantRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$restaurant->getId(), $request->request->get('_token'))) {
            $restaurantRepository->remove($restaurant, true);

            $this->addFlash("success", "Votre restaurant a bien été supprimé.");

        }

        return $this->redirectToRoute('app_back_restaurant_index', [], Response::HTTP_SEE_OTHER);
    }
}
