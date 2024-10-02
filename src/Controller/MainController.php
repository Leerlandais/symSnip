<?php

namespace App\Controller;

use App\Entity\MainCode;
use App\Repository\MainCodeRepository;
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
        ]);
    }

    #[Route('/exes', name: 'app_exes')]
    public function exes(): Response
    {
        return $this->render('main/exes.html.twig', [
            'controller_name' => 'ExesController',
        ]);
    }

    #[Route('/code', name: 'app_code')]
    public function code(): Response
    {
        return $this->render('main/code.html.twig', [
            'controller_name' => 'CodeController',
        ]);
    }


    #[Route(path: '/{type}/{id}', name: 'app_code_id', requirements: ['id'=>'\d+'], defaults: ['id'=>'1'])]
    public function oneCode(string $type, int $id): Response
    {
        if ($type === 'code') {
        return $this->render('main/oneCode.html.twig', [
            'controller_name' => 'CodeController',
            'success' => $id,
        ]);
        }else {
            return $this->render('main/code.html.twig', [
                'controller_name' => 'CodeController',
                'success' => 'There was a problem with the request',
            ]);
        }
    }


    #[Route('/html', name: 'app_html')]
    public function html(): Response
    {
        return $this->render('main/html.html.twig', [
            'controller_name' => 'HtmlController',
        ]);
    }
}
