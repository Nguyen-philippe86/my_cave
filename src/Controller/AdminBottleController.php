<?php

namespace App\Controller;

use App\Entity\Bottles;
use App\Form\BottleType;
use App\Repository\BottlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminBottleController extends AbstractController
{
    /**
     * @Route("/admin/bottle", name="admin_bottle")
     */
    public function index(BottlesRepository $repository): Response
    {
        $bottle = $repository->findAll();

        return $this->render('admin_bottle/adminBottle.html.twig', [
            'bottle' => $bottle,
        ]);
    }

    /**
     * @Route("/admin/bottle/creation", name="admin_bottle_creation")
     * @Route("/admin/bottle/{id}", name="admin_bottle_modification",  methods="GET|POST")
     */
    public function ajoutEtModif(Bottles $bottle = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$bottle) {
            $bottle = new Bottles();
        }
        $form = $this->createForm(BottleType::class, $bottle);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $modif = null !== $bottle->getId();
            $entityManager->persist($bottle);
            $entityManager->flush();
            $this->addFlash('success', ($modif) ? 'La modification a été effectué' : "L'ajout a été effectué");

            return $this->redirectToRoute('admin_bottle'); // redirige sur admin_bottle
        }

        return $this->render('admin_bottle/modificationBottle.html.twig', [
            'bottle' => $bottle,
            'form' => $form->createView(),
            'isModification' => null !== $bottle->getid(),
        ]);
    }

    /**
     * @Route("/admin/bottle/{id}", name="admin_bottle_suppression", methods="delete")
     */
    public function suppression(Bottles $bottle, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('SUP'.$bottle->getId(), $request->get('_token'))) {
            $entityManager->remove($bottle);
            $entityManager->flush();
            $this->addFlash('success', 'La suppression a été effectué');

            return $this->redirectToRoute('admin_bottle');
        }
    }
}
