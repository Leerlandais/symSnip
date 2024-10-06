<?php

namespace App\Controller;

use App\Entity\Html;
use App\Entity\MainCode;
use App\Entity\ExesCode;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $getLatest = $entityManager->getRepository(MainCode::class)->findBy([], ['id' => 'DESC'], 10, 0);
        $referer = $request->headers->get('referer');
        return $this->render('main/index.html.twig', [
            'getLatest' => $getLatest,
            'headerTitle' => "",
            'referer' => $referer,
        ]);
    }

    #[Route('/exes', name: 'app_exes')]
    public function exes(EntityManagerInterface $entityManager, Request $request): Response
    {
        $referer = $request->headers->get('referer');
        $getExes = $entityManager->getRepository(ExesCode::class)->findAll();
        return $this->render('main/exes.html.twig', [
            'getExes' => $getExes,
            'referer' => $referer,
        ]);
    }

    #[Route('/code/{id}', name: 'app_code', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function code(EntityManagerInterface $entityManager, Request $request, int $id): Response
    {
        $referer = $request->headers->get('referer');
        $code = $entityManager->getRepository(MainCode::class)->find($id);
        return $this->render('main/oneCode.html.twig', [
            'code' => $code,
            'referer' => $referer,
        ]);
    }


    #[Route(path: 'type/{type}', name: 'app_type')]
    public function oneType(EntityManagerInterface $entityManager, string $type, Request $request): Response
    {
        switch ($type) {
            case "phpCall" :
                $headerTitle = "PHP Call";
                break;
            case 'phpFunc' :
                $headerTitle = "PHP Function";
                break;
            case 'java':
                $headerTitle = "Javascript";
                break;
            case 'xtra':
                $headerTitle = "JS Extra";
                break;
            case 'unix' :
                $headerTitle = "Linux";
                break;
            case 'reac' :
                $headerTitle = "React";
                break;
            case 'node' :
                $headerTitle = "Node";
                break;
            case 'bash' :
                $headerTitle = "Bash Scripts";
                break;
            case 'else' :
                $headerTitle = "Other Snippets";
                break;
        }
        $referer = $request->headers->get('referer');
        $codes = $entityManager->getRepository(MainCode::class)->findBy(['type' => $type], ['id' => 'DESC']);

        return $this->render('main/code.html.twig', [
            'codes' => $codes,
            'headerTitle' => $headerTitle,
            'referer' => $referer,
        ]);

        }



    #[Route('/html', name: 'app_html')]
    public function html(EntityManagerInterface $entityManager, Request $request): Response
    {
        $referer = $request->headers->get('referer');
        $htmls = $entityManager->getRepository(Html::class)->findAll();
        return $this->render('main/html.html.twig', [
            'controller_name' => 'HTMLController',
            'headerTitle' => "HTML",
            'htmls' => $htmls,
            'referer' => $referer,
        ]);
    }

    #[Route('/html/{id}', name: 'app_oneHtml', requirements: ['id'=>'\d+'], methods: ['GET'])]
    public function oneHtml(EntityManagerInterface $entityManager, Request $request, int $id): Response
    {
        $referer = $request->headers->get('referer');
        $html = $entityManager->getRepository(Html::class)->find($id);
        return $this->render('main/oneHtml.html.twig', [
            'html' => $html,
            'referer' => $referer,
        ]);
    }



}
