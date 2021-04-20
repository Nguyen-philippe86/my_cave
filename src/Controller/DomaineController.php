<?php

namespace App\Controller;

use App\Entity\Domaine;
use App\Form\DomaineType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DomaineController extends AbstractController
{
    /**
     * @Route("/admin/ajout_domaine", name="admin_ajout_domaine")
     */
    public function ajoutDomaine(Domaine $domaine = null, Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$domaine) {
            $domaine = new Domaine();
        }
        $form2 = $this->createForm(DomaineType::class, $domaine);
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()) {
            $entityManager->persist($domaine);
            $entityManager->flush();

            return $this->redirectToRoute('admin_bottle');
        }

        return $this->render('admin_bottle/ajoutDomaine.html.twig', [
            'domaine' => $domaine,
            'form2' => $form2->createView(),
        ]);
    }
}
