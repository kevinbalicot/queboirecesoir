<?php

declare(strict_types=1);

namespace App\Application\Infrastructure\Symfony\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationAction extends AbstractController
{
    #[Route(path: '/', name: 'app_application')]
    public function __invoke(): Response
    {
        return $this->render('app.html.twig');
    }
}
