<?php

namespace App\Controller\Back;

use App\Entity\Eat;
use App\Entity\Image;
use App\Form\EatType;
use App\Repository\EatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/eat")
 */
class EatController extends AbstractController
{
    /**
     * @Route("/", name="app_back_eat_index", methods={"GET"})
     */
    public function index(EatRepository $eatRepository): Response
    {
        return $this->render('back/eat/index.html.twig', [
            'eats' => $eatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_eat_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EatRepository $eatRepository): Response
    {
        $eat = new Eat();
        $form = $this->createForm(EatType::class, $eat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eatRepository->add($eat, true);

            $this->addFlash("success", "Votre plat a bien été ajouté.");

            return $this->redirectToRoute('app_back_eat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/eat/new.html.twig', [
            'eat' => $eat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_eat_show", methods={"GET"})
     */
    public function show(Eat $eat, Image $image): Response
    {
        return $this->render('back/eat/show.html.twig', [
            'eat' => $eat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_eat_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Eat $eat, EatRepository $eatRepository): Response
    {
        $form = $this->createForm(EatType::class, $eat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $eat->setUpdatedAt(new \DateTime());

            $eatRepository->add($eat, true);

            $this->addFlash("success", "Votre plat a bien été modifié.");


            return $this->redirectToRoute('app_back_eat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/eat/edit.html.twig', [
            'eat' => $eat,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_eat_delete", methods={"POST"})
     */
    public function delete(Request $request, Eat $eat, EatRepository $eatRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$eat->getId(), $request->request->get('_token'))) {
            $eatRepository->remove($eat, true);

            $this->addFlash("success", "Votre plat a bien été supprimé.");

        }

        return $this->redirectToRoute('app_back_eat_index', [], Response::HTTP_SEE_OTHER);
    }
}
