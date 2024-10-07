<?php

namespace App\Controller;

use App\Entity\Html;
use App\Form\HtmlType;
use App\Repository\HtmlRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/html')]
final class AdminHtmlController extends AbstractController
{
    #[Route(name: 'app_admin_html_index', methods: ['GET'])]
    public function index(HtmlRepository $htmlRepository): Response
    {
        return $this->render('admin_html/index.html.twig', [
            'htmls' => $htmlRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_html_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $html = new Html();
        $form = $this->createForm(HtmlType::class, $html);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($html);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_html_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_html/new.html.twig', [
            'html' => $html,
            'form' => $form,
            'edit' => false,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_html_show', methods: ['GET'])]
    public function show(HtmlRepository $htmlRepository, int $id): Response
    {
        $html = $htmlRepository->find($id);
        return $this->render('admin_html/show.html.twig', [
            'html' => $html,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_html_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Html $html, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HtmlType::class, $html);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_html_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_html/edit.html.twig', [
            'html' => $html,
            'form' => $form,
            'edit' => true,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_html_delete', methods: ['POST'])]
    public function delete(Request $request, Html $html, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$html->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($html);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_html_index', [], Response::HTTP_SEE_OTHER);
    }
}
