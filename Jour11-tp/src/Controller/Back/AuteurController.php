<?php

namespace App\Controller\Back;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Repository\AuteurRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/auteur')]
final class AuteurController extends AbstractController
{
    #[Route(name: 'app_auteur_index', methods: ['GET'])]
    public function index(AuteurRepository $auteurRepository): Response
    {
        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_auteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager , UserPasswordHasherInterface $hasher): Response
    {

        $auteur = new Auteur();
        $form = $this->createForm(AuteurType::class);
        $form->handleRequest($request);

        
        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            
            $auteur->setEmail($data["email"])
                   ->setPassword(
                    $hasher->hashPassword($auteur , $data['passwordPlainText'])
                   )
                   ->setRoles([$data["roles"]]) ;

            $entityManager->persist($auteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('auteur/new.html.twig', [
            'auteur' => $auteur,
            'form' => $form
        ]);
    }

    #[Route('/{id}', name: 'app_auteur_show', methods: ['GET'])]
    public function show(Auteur $auteur): Response
    {
        return $this->render('auteur/show.html.twig', [
            'auteur' => $auteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_auteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Auteur $auteur, EntityManagerInterface $entityManager, AuteurRepository $auteurRepository, UserPasswordHasherInterface $hasher): Response
    {
        // dd($auteur);
        $form = $this->createForm(AuteurType::class, null, [
            "auteur" => $auteur,
            "password_obligatoire" => false
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $entityManager->flush();

            $data = $form->getData();
            $id = $request->attributes->get("id");
            /** @var Auteur $auteur */
            $auteur = $auteurRepository->findOneBy(["id" => $id]);

            // Effectuer l'UPDATE :
            if (empty($data["passwordPlainText"])) {

                // Sans changement de password
                $auteur->setEmail($data["email"])
                       ->setRoles([$data["roles"]]);

            }else {

                // Avec changement password
                $auteur->setEmail($data["email"])
                       ->setRoles([$data["roles"]])
                       ->setPassword($hasher->hashPassword($auteur, $data["passwordPlainText"] ));

            }

            $entityManager->persist($auteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_auteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('auteur/edit.html.twig', [
            'auteur' => $auteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_auteur_delete', methods: ['POST'])]
    public function delete(Request $request, Auteur $auteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auteur->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($auteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_auteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
