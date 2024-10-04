<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{

    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'title' => 'Administration',
        ]);
    }

    #[Route('/admin/add/code', name: 'admin_add_code')]
    public function addCode(): Response
    {
        return $this->render('admin/addCode.html.twig', [
            'title' => 'Administration | Add Code',
        ]);
    }

    #[Route('/admin/add/html', name: 'admin_add_html')]
    public function addHtml(): Response
    {
        return $this->render('admin/addHtml.html.twig', [
            'title' => 'Administration | Add Html',
        ]);
    }

    #[Route('/admin/add/exes', name: 'admin_add_exes')]
    public function addExes(): Response
    {
        return $this->render('admin/addExes.html.twig', [
            'title' => 'Administration | Add Exes',
        ]);
    }
}


