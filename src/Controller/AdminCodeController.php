<?php

namespace App\Controller;

use App\Entity\MainCode;
use App\Form\MainCodeType;
use App\Repository\MainCodeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/code')]
final class AdminCodeController extends AbstractController
{
    #[Route(name: 'app_admin_code_index', methods: ['GET'])]
    public function index(MainCodeRepository $mainCodeRepository): Response
    {
        return $this->render('admin_code/index.html.twig', [
            'main_codes' => $mainCodeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_code_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $mainCode = new MainCode();
        $form = $this->createForm(MainCodeType::class, $mainCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($mainCode);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_code_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_code/new.html.twig', [
            'main_code' => $mainCode,
            'form' => $form,
            'edit' => false,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_code_show', methods: ['GET'])]
    public function show(MainCode $mainCode): Response
    {
        return $this->render('admin_code/show.html.twig', [
            'main_code' => $mainCode,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_code_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MainCode $mainCode, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MainCodeType::class, $mainCode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_code_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_code/edit.html.twig', [
            'main_code' => $mainCode,
            'form' => $form,
            'edit' => true,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_code_delete', methods: ['POST'])]
    public function delete(Request $request, MainCode $mainCode, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mainCode->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($mainCode);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_code_index', [], Response::HTTP_SEE_OTHER);
    }
}
