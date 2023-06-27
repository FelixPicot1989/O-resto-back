<?php

namespace App\Controller\Back;

use App\Entity\Eat;
use App\Entity\Menu;
use App\Form\MenuType;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/menu")
 */
class MenuController extends AbstractController
{
    /**
     * @Route("/", name="app_back_menu_index", methods={"GET"})
     */
    public function index(MenuRepository $menuRepository): Response
    {
        return $this->render('back/menu/index.html.twig', [
            'menus' => $menuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_menu_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MenuRepository $menuRepository): Response
    {
        $menu = new Menu();

        $form = $this->createForm(MenuType::class, $menu);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $menuRepository->add($menu, true);

            $this->addFlash("success", "Votre menu a bien été ajouté.");


            return $this->redirectToRoute('app_back_menu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/menu/new.html.twig', [
            'menu' => $menu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_menu_show", methods={"GET"})
     */
    public function show(Menu $menu, Eat $eat): Response
    {
        return $this->render('back/menu/show.html.twig', [
            'menu' => $menu,
            'eats' => $eat
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_menu_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Menu $menu, MenuRepository $menuRepository): Response
    {
        $form = $this->createForm(MenuType::class, $menu);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $menu->setUpdatedAt(new \DateTime());
            
            $menuRepository->add($menu, true);

            $this->addFlash("success", "Votre menu a bien été modifié.");


            return $this->redirectToRoute('app_back_menu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/menu/edit.html.twig', [
            'menu' => $menu,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_menu_delete", methods={"POST"})
     */
    public function delete(Request $request, Menu $menu, MenuRepository $menuRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$menu->getId(), $request->request->get('_token'))) {
            $menuRepository->remove($menu, true);

            $this->addFlash("success", "Votre menu a bien été supprimé.");

        }

        return $this->redirectToRoute('app_back_menu_index', [], Response::HTTP_SEE_OTHER);
    }
}
