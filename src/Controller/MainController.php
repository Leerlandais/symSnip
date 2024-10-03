<?php

namespace App\Controller;

use App\Entity\MainCode;
use App\Entity\ExesCode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $getLatest = $entityManager->getRepository(MainCode::class)->findBy([], ['id' => 'DESC'], 10, 0);
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'getLatest' => $getLatest,
            'headerTitle' => "",
            'success' => "",
        ]);
    }

    #[Route('/exes', name: 'app_exes')]
    public function exes(EntityManagerInterface $entityManager): Response
    {
        $getExes = $entityManager->getRepository(ExesCode::class)->findAll();
        return $this->render('main/exes.html.twig', [
            'getExes' => $getExes,
        ]);
    }

    #[Route('/code/{id}', name: 'app_code', methods: ['GET'])]
    public function code(EntityManagerInterface $entityManager, int $id): Response
    {
        $code = $entityManager->getRepository(MainCode::class)->find($id);
        return $this->render('main/code.html.twig', [
            'code' => $code,
        ]);
    }


    #[Route(path: 'type/{type}', name: 'app_type')]
    public function oneCode(string $type): Response
    {

        return $this->render('main/oneCode.html.twig', [
            'controller_name' => 'CodeController',
            'success' => $type,
        ]);

        }



    #[Route('/html', name: 'app_html')]
    public function html(): Response
    {
        return $this->render('main/html.html.twig', [
            'controller_name' => 'HtmlController',
        ]);
    }
}
