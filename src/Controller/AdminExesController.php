<?php

namespace App\Controller;

use App\Entity\ExesCode;
use App\Form\ExesCodeType;
use App\Repository\ExesCodeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/exes')]
final class AdminExesController extends AbstractController
{
    #[Route(name: 'app_admin_exes_index', methods: ['GET'])]
    public function index(ExesCodeRepository $exesCodeRepository): Response
    {
        return $this->render('admin_exes/index.html.twig', [
            'exes_codes' => $exesCodeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_exes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $exesCode = new ExesCode();
        $form = $this->createForm(ExesCodeType::class, $exesCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($exesCode);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_exes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_exes/new.html.twig', [
            'exes_code' => $exesCode,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_exes_show', methods: ['GET'])]
    public function show(ExesCode $exesCode): Response
    {
        return $this->render('admin_exes/show.html.twig', [
            'exes_code' => $exesCode,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_exes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ExesCode $exesCode, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExesCodeType::class, $exesCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_exes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_exes/edit.html.twig', [
            'exes_code' => $exesCode,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_exes_delete', methods: ['POST'])]
    public function delete(Request $request, ExesCode $exesCode, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exesCode->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($exesCode);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_exes_index', [], Response::HTTP_SEE_OTHER);
    }
}
