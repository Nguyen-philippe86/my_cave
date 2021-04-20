<?php

namespace App\Controller;

use App\Entity\Bottles;
use App\Repository\BottlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BottleController extends AbstractController
{
    /**
     * @Route("/", name="bottles")
     */
    public function index(BottlesRepository $repository): Response
    {
        $bottle = $repository->findAll();

        return $this->render('bottle/bottles.html.twig', [
            'bottle' => $bottle,
        ]);
    }

    /**
     * @Route("/{id}", name="show_bottles")
     *
     * @param mixed $id
     */
    public function show($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Bottles::class);
        $bottle = $repository->find($id);

        return $this->render('bottle/show.html.twig', [
            'bottle' => $bottle,
        ]);
    }
}
